<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreNavigations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_navigations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable()->default(0);
            $table->string('label');
            $table->string('icon');
            $table->string('tooltip')->nullable();
            $table->string('position')->default('sidebar');
            $table->string('type');
            $table->boolean('active');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->string('model')->nullable();
            $table->string('list')->nullable();
            $table->string('form')->nullable();
            $table->string('view')->nullable();
            $table->text('script')->nullable();
            $table->uuid('uipage_id')->nullable();
            $table->uuid('record_id')->nullable();
            $table->uuid('dashboard_id')->nullable();
            $table->uuid('widget_id')->nullable();
            $table->uuid('nav_application_id');
            $table->uuid('engine_application_id');
            $table->uuid('parent_id')->nullable();
            $table->integer('sort_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_navigations');
    }
}
