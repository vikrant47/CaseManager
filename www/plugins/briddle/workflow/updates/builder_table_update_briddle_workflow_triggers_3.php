<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowTriggers3 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->string('value', 255);
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->dropColumn('value');
        });
    }
}
