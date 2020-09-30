<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerCasePriorities extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_case_priorities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name');
            $table->integer('active');
            $table->string('description');
            $table->integer('value');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_casemanager_case_priorities');
    }
}
