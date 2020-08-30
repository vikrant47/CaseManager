<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreLibraries extends Migration
{
    public function up()
    {
        Schema::create('demo_core_libraries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->text('css_files')->nullable();
            $table->text('javascript_files')->nullable();
            $table->uuid('engine_application_id');
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->text('website');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_libraries');
    }
}
