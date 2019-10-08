<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowWorkflows3 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->renameColumn('actors', 'items');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->renameColumn('items', 'actors');
        });
    }
}
