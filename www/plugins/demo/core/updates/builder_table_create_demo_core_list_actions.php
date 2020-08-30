<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreListActions extends Migration
{
    public function up()
    {
        Schema::create('demo_core_list_actions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->string('list')->nullable();
            $table->string('model')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('toolbar')->default(true);
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('css_class')->nullable();
            $table->integer('sort_order')->default(0);
            $table->uuid('engine_application_id');
            $table->text('script');
            $table->text('html_attributes')->default('[]');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_list_actions');
    }
}
