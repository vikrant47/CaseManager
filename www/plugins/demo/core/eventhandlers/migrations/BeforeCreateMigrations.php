<?php

namespace Demo\Core\EventHandlers\Migrations;


use Demo\Core\Classes\Enums\HandlerType;
use Demo\Core\Models\ModelModel;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * This will auto generate permission code
 * Steps -
 * Step 1. Create policy for the model
 * Step 2. Create Permissions for the model
 */
class BeforeCreateMigrations
{
    public $model = 'universal';
    public $events = ['execute'];
    public $handlerType = HandlerType::QUERY_EVENT_HANDLER;
    public $sort_order = -1000;

    public function handler($event, $query)
    {
        if ($query) {

        }
    }

    public function handleCreate($model)
    {
        $modelRecord = new ModelModel();

    }

    public function handleDelete($model)
    {

    }

}
