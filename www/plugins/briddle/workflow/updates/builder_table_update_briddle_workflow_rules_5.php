<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowRules5 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->dropColumn('active');
            $table->dropColumn('next');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_rules', function($table)
        {
            $table->smallInteger('active');
            $table->string('next', 11);
        });
    }
}
