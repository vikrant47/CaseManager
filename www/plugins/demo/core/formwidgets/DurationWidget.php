<?php namespace Demo\Core\FormWidgets;

use Backend\FormWidgets\DatePicker;
use Config;
use Carbon\Carbon;
use Backend\Classes\FormField;
use Backend\Classes\FormWidgetBase;
use Demo\Core\Models\ModelModel;
use System\Helpers\DateTime as DateTimeHelper;

/**
 * Date picker
 * Renders a date picker field.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class DurationWidget extends DatePicker
{
    static function getProperties()
    {
        return [
            /*'modelType' => [
                'title' => 'Model',
                'type' => 'dropdown',
                'ignoreIfEmpty' => true,
                'options' => ModelModel::getModelAsDropdownOptions()
            ],
            'modelField' => [
                'title' => 'Model Field',
                'type' => 'dropdown',
                'ignoreIfEmpty' => true,
                'default' => 'model',
                'options' => DurationWidget::getModelFieldOptions()
            ]*/
        ];
    }
    public static function getModelFieldOptions()
    {
        return [];
    }
    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('durationwidget');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
       // $parentValue = parent::getSaveValue($value);
        $endTime=$this->setEndTime($value);
        return $endTime;
    }
    public function setEndTime($value){
        $endTime = Carbon::parse($value)->timestamp;
        return $endTime;
    }
}
