<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreCustomFields extends Migration
{
    public function up()
    {
        Schema::create('demo_core_custom_fields', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->string('type');
            $table->string('model');
            $table->integer('length')->nullable();
            $table->boolean('unsigned')->nullable();
            $table->boolean('allow_null');
            $table->text('default');
            $table->uuid('engine_application_id');

            $table->unique(['model', 'code']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_custom_fields');
    }
}
