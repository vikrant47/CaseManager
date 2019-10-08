<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowActions3 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->string('type', 255);
            $table->string('value', 255);
            $table->dropColumn('code');
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_actions', function($table)
        {
            $table->dropColumn('type');
            $table->dropColumn('value');
            $table->text('code');
        });
    }
}
