<?php namespace Demo\Core\Classes\Utils;


use Demo\Core\Models\EngineApplication;
use Demo\Core\Services\SecurityService;
use October\Rain\Database\Collection;
use October\Rain\Database\Relations\BelongsToMany;
use BackendAuth;
use RainLab\Builder\Classes\IconList;
use Webpatser\Uuid\Uuid;

class ModelUtil
{
    /**Returns models class from form/list config */
    public static function getModelClass($config)
    {
        $modelClass = $config->modelClass;
        if (strpos($modelClass, '\\') === 0) { // some model classes starts with \\
            $modelClass = substr($modelClass, 1);
        }
        return $modelClass;
    }

    /**Return given model as classname -> recordId format*/
    public static function toString($model, $prop = 'id')
    {
        if (empty($model)) {
            return 'null';
        }
        return '[' . get_class($model) . ' -> ' . ($model->{$prop} || 'new') . ']';
    }

    public static function isNew($model)
    {
        return empty($model->id);
    }

    public static function isChanged($model, string $prop)
    {
        return $model->isDirty($prop);
    }

    public static function fillDefaultColumnsInBelongsToMany(
        BelongsToMany $association,
        Collection &$data,
        $engineAppId = EngineApplication::ENGINE_APP_ID,
        $otherColumns = []
    )
    {
        if (empty($data)) {
            return;
        }
        if (empty($engineAppId)) {
            $engineAppId = EngineApplication::ENGINE_APP_ID;
        }
        $user = BackendAuth::getUser();
        $pivotValues = [
            // 'id' => (string)Uuid::generate(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
            'engine_application_id' => $engineAppId,
            'created_by_id' => $user->id,
            'updated_by_id' => $user->id,
        ];
        $associationSync = [];
        foreach ($data as $record) {
            $pivotValues = [
                'id' => (string)Uuid::generate(),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
                'engine_application_id' => $engineAppId,
                'created_by_id' => $user->id,
                'updated_by_id' => $user->id,
            ];
            $pivotValues = array_merge($pivotValues, $otherColumns);
            $association->detach($record->id);
            $association->attach($record->id, $pivotValues);

        }
        $association->syncWithoutDetaching($associationSync);
    }

    public static function getShortName($class)
    {
        $reflect = new \ReflectionClass($class);
        return $reflect->getShortName();
    }

    public static function getPluginCode($class)
    {
        $classPaths = str_split($class, '\\');
        return $classPaths[0] . '.' . $classPaths[1];
    }

    public static function toStdClassObject($array)
    {
        return (object)$array;
    }

    public static function toPojo($model, $childModelProps = [], $additionalProps = [])
    {
        $pojo = new \stdClass();
        foreach ($model->attributes as $key => $attribute) {
            $pojo->{$key} = $attribute;
        }
        foreach ($childModelProps as $childModel) {
            if (!empty($model->{$childModel})) {
                $pojo->{$childModel} = ModelUtil::toPojo($model->{$childModel});
            }
        }
        foreach ($additionalProps as $key => $additionalProp) {
            $pojo->{$key} = $additionalProp;
        }
        return $pojo;
    }

    public static function getIconListWitoutIconClass()
    {
        $icons = [];
        $list = IconList::getList();
        foreach ($list as $icon => $display) {
            $icons[$icon] = $display[0];
        }
        return $icons;
    }

    /**
     * This will sort the given tree based to the given sort field
     * @param $rootNodes
     * @param string $sortField
     * @param string $childrenField
     * @param string $parentIdField
     * @return \Illuminate\Support\Collection|\October\Rain\Support\Collection
     */
    public static function sortForest($rootNodes, $sortField = 'sort_order', $childrenField = 'children', $parentIdField = 'parent_id')
    {
        if (is_array($rootNodes)) {
            $rootNodes = collect($rootNodes); //converting to collection
        }
        $rootNodes = $rootNodes->sortBy($sortField);
        foreach ($rootNodes as $rootNode) {
            if (!empty($rootNode->{$childrenField})) {
                /**@var $children \Illuminate\Support\Collection* */
                $children = $rootNode->{$childrenField};
                $children = self::sortForest($children, $sortField, $childrenField, $parentIdField);
                $rootNode->{$childrenField} = $children;
            }
        }
        return $rootNodes;
    }
}
