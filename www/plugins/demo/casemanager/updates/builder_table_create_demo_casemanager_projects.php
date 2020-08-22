<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerProjects extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_projects', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->default(0);
            $table->string('label');
            $table->text('description')->nullable();
            $table->uuid('workflow_id')->nullable();
            $table->string('name');
            $table->string('project_type')->nullable();
            $table->uuid('project_lead_id')->nullable();
            $table->integer('default_assignee_id');
            $table->string('image')->nullable();
            $table->text('url')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_casemanager_projects');
    }
}
