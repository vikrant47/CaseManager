<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreFormFields extends Migration
{
    public function up()
    {
        Schema::create('demo_core_form_fields', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('label');
            $table->integer('field_id');
            $table->string('form');
            $table->integer('plugin_id');
            $table->text('controls');
            $table->text('description')->nullable();
            $table->smallInteger('active');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_form_fields');
    }
}
