<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreModelAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_model_associations', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('source_model', 255);
            $table->string('target_model', 255);
            $table->string('foreign_key', 255)->nullable();
            $table->string('cascade')->default('none');
            $table->string('relation');
            $table->uuid('engine_application_id');
            $table->integer('cascade_priority_order')->default(0);
            $table->text('description')->nullable();
            $table->string('name', 255);
            $table->boolean('active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_model_associations');
    }
}
