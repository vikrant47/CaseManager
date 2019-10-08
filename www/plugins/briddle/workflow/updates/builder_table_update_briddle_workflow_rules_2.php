<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowRules2 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->renameColumn('call', 'rule_id');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->renameColumn('rule_id', 'call');
        });
    }
}
