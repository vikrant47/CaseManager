<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBriddleWorkflowWorkflows2 extends Migration
{
    public function up()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('briddle_workflow_workflows', function($table)
        {
            $table->dropColumn('actors');
        });
    }
}
