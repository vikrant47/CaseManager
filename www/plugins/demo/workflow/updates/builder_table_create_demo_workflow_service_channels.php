<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowServiceChannels extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_service_channels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('plugin_id');
            $table->string('name');
            $table->string('event');
            $table->text('description');
            $table->string('model');
            $table->integer('inbox_order');
            $table->boolean('active')->default(true);
            $table->string('assigned_to_field')->default('assigned_to_id');
            $table->integer('assignment_capacity')->default(-1);
            $table->text('condition');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_service_channels');
    }
}
