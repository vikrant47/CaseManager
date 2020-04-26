<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreModels extends Migration
{
    public function up()
    {
        Schema::create('demo_core_models', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name', 255);
            $table->string('model', 255);
            $table->string('controller', 255);
            $table->integer('plugin_id');
            $table->boolean('audit')->default(false);
            $table->boolean('viewable')->default(false);
            $table->boolean('record_history')->default(false);
            $table->text('audit_columns')->default('*');
            $table->text('description')->default('')->nullable();
            $table->boolean('attach_audited_by')->default(false);

            // Index definitions
            $table->unique('model');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_models');
    }
}
