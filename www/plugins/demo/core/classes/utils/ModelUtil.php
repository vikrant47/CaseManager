<?php namespace Demo\Core\Classes\Utils;


use Demo\Core\Services\SecurityService;
use October\Rain\Database\Collection;
use October\Rain\Database\Relations\BelongsToMany;
use BackendAuth;
use RainLab\Builder\Classes\IconList;

class ModelUtil
{
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

    public static function fillDefaultColumnsInBelongsToMany(BelongsToMany $association, Collection $data, $pluginId = 10, $otherColumns = [])
    {
        if (empty($pluginId)) {
            $pluginId = 10;
        }
        $user = BackendAuth::getUser();
        $pivotValues = [
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
            'plugin_id' => $pluginId,
            'created_by_id' => $user->id,
            'updated_by_id' => $user->id,
        ];
        $pivotValues = array_merge($pivotValues, $otherColumns);
        $associationSync = [];
        foreach ($data as $record) {
            $associationSync[$record->id] = $pivotValues;
            $association->detach($record->id);
            $association->attach($record->id, $pivotValues);
        }
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