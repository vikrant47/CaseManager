<?php namespace Demo\Workspace\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorks extends Migration
{
    public function up()
    {
        Schema::create('demo_workspace_works', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('model', 255);
            $table->uuid('record_id');
            $table->uuid('workflow_id')->nullable();
            $table->uuid('service_channel_id');
            $table->integer('assigned_to_id')->nullable();
            $table->integer('priority')->default(1);
            $table->uuid('workflow_state_id')->nullable();
            $table->string('status')->default('init');
            $table->timestamp('completed_at')->nullable();
            $table->json('context')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workspace_works');
    }
}
