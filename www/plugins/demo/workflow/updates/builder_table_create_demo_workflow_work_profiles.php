<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkProfiles extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_work_profiles', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('channels_profile');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->integer('version')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_work_profiles');
    }
}
