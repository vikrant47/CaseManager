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
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->text('description');
            $table->text('script');
            $table->boolean('active')->default(true);
            $table->boolean('virtual')->default(true);
            $table->string('queue_order', 255);
            $table->integer('sort_order');
            $table->text('condition');
            $table->string('model',255);
            $table->string('redundancy_policy',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->uuid('service_channel_id');
            $table->uuid('pop_criteria_id');
            $table->uuid('routing_rule_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_queues');
    }
}
