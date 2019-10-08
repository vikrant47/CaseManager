<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowTriggers2 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->string('type', 255);
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
