<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowWorkflows extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->text('rules')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->text('rules')->nullable(false)->change();
        });
    }
}
