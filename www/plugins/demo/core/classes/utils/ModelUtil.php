<?php namespace Demo\Core\Classes\Utils;


use Demo\Core\Services\SecurityService;
use October\Rain\Database\Collection;
use October\Rain\Database\Relations\BelongsToMany;
use BackendAuth;

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
        if(empty($pluginId)){
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
}