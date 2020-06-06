<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerCases extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_cases', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id')->nullable();
            $table->integer('updated_by_id')->nullable();
            $table->integer('assigned_to_id')->nullable();
            $table->uuid('priority_id')->nullable();
            $table->string('case_number', 255);
            $table->string('case_version', 255);
            $table->integer('version');
            $table->string('suspect', 255);
            $table->bigInteger('tat_duration');
            $table->text('comments', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_cases');
    }
}
