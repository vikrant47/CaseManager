<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerProjects extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_projects', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable()->default(0);
            $table->string('label');
            $table->text('description')->nullable();
            $table->integer('workflow_id')->nullable();
            $table->string('name');
            $table->string('project_type')->nullable();
            $table->integer('project_lead_id')->nullable();
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
