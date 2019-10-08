<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowRules3 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->dropColumn('rule_id');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->integer('rule_id');
        });
    }
}
