<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflows extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_workflows', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('active')->default(1);
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->text('definition');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->integer('sort_order');
            $table->string('model',255);
            $table->text('input_condition');
            $table->string('event')->nullable();
            $table->string('model_state_field')->default('workflow_state_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_workflows');
    }
}
