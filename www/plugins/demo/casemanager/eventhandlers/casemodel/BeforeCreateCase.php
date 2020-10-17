<?php


namespace Demo\Casemanager\EventHandlers\CaseModel;

use Demo\Casemanager\Models\CaseModel;
use Illuminate\Database\Eloquent\Model;

/**Event to be captured before creating a Case*/
class BeforeCreateCase
{
    public $model = CaseModel::class;
    public $events = ['creating', 'updating'];
    public $sort_order = 9999;

    /**
     * Assign work in case model
     * @param string $event
     * @param Model $model
     */
    public function handler($event, $model)
    {
        $work = request()->attributes->get('WORK_' . $model->id);
        $model->work_id = $work->id;
    }
}
