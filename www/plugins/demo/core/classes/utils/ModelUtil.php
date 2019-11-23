<?php namespace Demo\Core\Classes\Utils;


class ModelUtil
{
    /**Return given model as classname -> recordId format*/
    public static function toString($model, $prop = 'id')
    {
        if (empty($model)) {
            return 'null';
        }
        return get_class($model) . ' -> ' . ($model->{$prop} || 'new');
    }

    public static function isNew($model)
    {
        return empty($model->id);
    }
}