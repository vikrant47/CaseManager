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
    public $DeferenceInDays;
    public $taskEndTime;

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
        $this->vars['placeholder'] = $this->placeholder;
        $this->vars['field'] = $this->formField;
        $this->populateSelectedType();
    }
    public function populateSelectedType(){
        $updated = Carbon::createFromTimestamp($this->getLoadValue());
        $now = Carbon::now();
        if ($updated->diff($now)->m < 1) {
            $lastOnline = $updated->lte($now);
            $this->DeferenceInDays = $updated->lte($now)?'':$updated->diffInSeconds($now);
            $this->selectedValue= 'sec';
        } else if ($updated->diff($now)->h < 1) {
            $lastOnline = $updated->diffInMinutes($now);
            $this->DeferenceInDays = $lastOnline;
            $this->selectedValue= 'min';
        } else if ($updated->diff($now)->d < 1) {
            $lastOnline = $updated->diffInHours($now);
            $this->DeferenceInDays = $lastOnline;//Carbon::createFromTimestamp($this->getLoadValue())->hour-Carbon::now()->hour;
            $this->selectedValue= 'hours';
        } else if ($updated->diffInWeeks($now)<0) {
            $lastOnline = $updated->diffInDays($now);
            $this->DeferenceInDays = $lastOnline;//Carbon::createFromTimestamp($this->getLoadValue())->hour-Carbon::now()->hour;
            $this->selectedValue= 'days';
        } else if ($updated->diffInWeeks($now)>0 && $updated->diffInMonths($now) < 12) {
            $lastOnline = $updated->diffInWeeks(Carbon::today());
            $this->DeferenceInDays = $lastOnline;
            $this->selectedValue= 'weeks';
        } else if ($updated->diff($now)->y < 1) {
            $lastOnline = $updated->diffInMonths(Carbon::today());
            $this->DeferenceInDays = $lastOnline;
            $this->selectedValue= 'months';
        } else {
            $lastOnline = $updated->diffInYears(Carbon::today());
            $this->DeferenceInDays = $lastOnline;
            $this->selectedValue= 'years';
        }
        dump($lastOnline);
        dump(Carbon::now()->diff(Carbon::createFromTimestamp($this->getLoadValue()))->format('%H:%I:%S'));
        $this->selectedValue= $this->selectedValue;
        $this->formField->value =$this->DeferenceInDays;
        $this->taskEndTime=$updated;
    }
    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        $selectedType = Input::get('_tatSelectedType');
        $endTime=$this->setEndTime($selectedType,$value);
        return $endTime;
    }

    public function setEndTime($selectedType,$value){
        $startDay = Carbon::now();
        $endTime="";
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
        }else if($selectedType=="min"){
            $endTime=$startDay->addMinutes($value)->timestamp;
        }else{
            $endTime=$startDay->addSeconds($value)->timestamp;
        }
        return $endTime;
    }
}