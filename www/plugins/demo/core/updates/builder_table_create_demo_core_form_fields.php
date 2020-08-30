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
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('label');
            $table->uuid('field_id')->nullable();
            $table->string('form');
            $table->uuid('engine_application_id');
            $table->text('controls');
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->boolean('virtual');

            $table->unique('form', 'field_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_form_fields');
    }
}
