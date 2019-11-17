<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowQueueAssignmentRules extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_queue_assignment_rules', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->text('script');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_queue_assignment_rules');
    }
}
