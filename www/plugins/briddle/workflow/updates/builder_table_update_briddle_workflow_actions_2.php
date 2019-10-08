<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowActions2 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->string('name', 255)->change();
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->string('name', 191)->change();
        });
    }
}
