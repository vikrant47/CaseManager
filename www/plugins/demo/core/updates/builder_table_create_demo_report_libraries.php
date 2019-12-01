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
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->text('css_files');
            $table->text('javascript_files');
            $table->integer('plugin_id');
            $table->string('name');
            $table->text('description');
            $table->smallInteger('website');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_libraries');
    }
}
