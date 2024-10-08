<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCorePermissions extends Migration
{
    public function up()
    {
        Schema::create('demo_core_permissions', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->string('model');
            $table->string('operation');
            $table->text('columns')->nullable();
            $table->text('condition')->nullable();
            $table->string('code');
            $table->boolean('admin_override')->default(true);
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->boolean('system')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_permissions');
    }
}
