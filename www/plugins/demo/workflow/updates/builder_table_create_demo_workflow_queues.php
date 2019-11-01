<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowQueues extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_queues', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->text('description');
            $table->smallInteger('active')->default(1);
            $table->smallInteger('virtual')->default(1);
            $table->text('trigger')->default(1);
            $table->smallInteger('virtual')->default(1);
            $table->smallInteger('virtual')->default(1);
            $table->string('queue_order', 255);
            $table->integer('sort_order', 255);
            $table->text('script');
            $table->text('pop_criteria');
            $table->text('input_condition');
            $table->string('supported_items_type',255);
            $table->string('redundancy_policy',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_queues');
    }
}
