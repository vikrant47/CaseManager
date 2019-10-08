<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowTriggers4 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->dropColumn('code');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_triggers', function($table)
        {
            $table->text('code');
        });
    }
}
