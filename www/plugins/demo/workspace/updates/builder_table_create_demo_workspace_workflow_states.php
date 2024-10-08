<?php namespace Demo\Workspace\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflowStates extends Migration
{
    public function up()
    {
        Schema::create('demo_workspace_workflow_states', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('active');
            $table->string('code');
            $table->uuid('engine_application_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workspace_workflow_states');
    }
}
