<?php

namespace Demo\Core\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use October\Rain\Support\Facades\Form;


class DurationWidget extends FormWidgetBase
{
    public $selectedValue="days";
    public $DeferenceInDays="";
    public function widgetDetails(){
        return[
            'name'=>'Duration',
            'description'=>'Field for duration'
        ];
    }
    public function render() {
        $this->prepareVars();
        return $this->makePartial('durationwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        Carbon::setLocale('in');
        $created = Carbon::createFromTimestamp($this->getLoadValue())->toDateTimeString();
        $todayDate = Carbon::today();
        if($todayDate->diffInMonths($created)<=0){
            if($todayDate->diffInWeeks($created)>0){
                $this->DeferenceInDays = $todayDate->diffInWeeks($created);
                $this->selectedValue= 'weeks';
            }else if($todayDate->diffInWeeks($created)<=0 && $todayDate->diffInDays($created)>0){
                $this->DeferenceInDays = $todayDate->diffInDays($created);
                $this->selectedValue= 'days';
            }else if($todayDate->diffInDays($created)<=0 && $todayDate->diffInHours($created)>0){
                $this->DeferenceInDays = $todayDate->diffInHours($created);
                $this->selectedValue= 'hours';
            }else{
                $this->DeferenceInDays = $todayDate->diffInSeconds($created);
                $this->selectedValue= 'sec';
            }
        }else if($todayDate->diffInMonths($created)>0 && $todayDate->diffInMonths($created)<=11){
            $this->DeferenceInDays = $todayDate->diffInMonths($created);
            $this->selectedValue= 'months';
        }else if($todayDate->diffInMonths($created)>11){
            $this->DeferenceInDays = $todayDate->diffInYears($created);
            $this->selectedValue= 'years';
        }

        $this->vars['placeholder'] = $this->placeholder;
        $this->vars['field'] = $this->formField;
        $this->selectedValue= $this->selectedValue;
        $this->formField->value =$this->DeferenceInDays;

    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        Carbon::setLocale('in');
        $startDay = Carbon::now();
        $endTime="";
        $selectedType = Input::get('_tatSelectedType');
        if($selectedType=="days"){
            $endTime=$startDay->addDay($value)->timestamp;
        }else if($selectedType=="weeks"){
            $endTime=$startDay->addWeek($value)->timestamp;
        }else if($selectedType=="months"){
            $endTime=$startDay->addMonths($value)->timestamp;
        }else if($selectedType=="years"){
            $endTime=$startDay->addYear($value)->timestamp;
        }else if($selectedType=="hours"){
            $endTime=$startDay->addHours($value)->timestamp;
        }else{
            $endTime=$startDay->addSeconds($value)->timestamp;
        }
        return $endTime;
    }
}