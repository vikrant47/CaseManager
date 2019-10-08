<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowRules4 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->string('next');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->dropColumn('next');
        });
    }
}
