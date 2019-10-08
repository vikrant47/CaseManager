<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowActions extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->string('name');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->dropColumn('name');
            $table->increments('id')->unsigned()->change();
        });
    }
}
