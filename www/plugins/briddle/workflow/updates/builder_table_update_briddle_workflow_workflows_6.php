<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowWorkflows6 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->dropColumn('active');
            $table->dropColumn('trigger_id');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->smallInteger('active');
            $table->integer('trigger_id');
        });
    }
}
