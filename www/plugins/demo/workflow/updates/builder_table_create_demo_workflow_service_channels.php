<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowServiceChannels extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_service_channels', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->string('name');
            $table->text('description');
            $table->string('model');
            $table->integer('priority');
            $table->boolean('active')->default(true);
            $table->text('condition');
            $table->integrer('sort_order')->default(0);
            $table->boolean('auto_start_workflow')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_service_channels');
    }
}
