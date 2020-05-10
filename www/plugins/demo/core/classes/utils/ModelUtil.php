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

    public static function fillDefaultColumnsInBelongsToMany(BelongsToMany $association, Collection $data, $pluginId = 10)
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
}