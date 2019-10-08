<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowRules extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->integer('call');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->dropColumn('call');
        });
    }
}
