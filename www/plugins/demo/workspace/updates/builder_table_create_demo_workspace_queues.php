<?php namespace Demo\Workspace\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowQueues extends Migration
{
    public function up()
    {
        Schema::create('demo_workspace_queues', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->text('description');
            $table->boolean('active')->default(true);
            $table->json('user_expression')->default('[]');
            $table->integer('priority')->default(1);
            $table->boolean('age_priority')->default(true);
            $table->string('age_unit')->default('millisecond');
            $table->decimal('age_priority_boost')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->uuid('routing_rule_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workspace_queues');
    }
}
