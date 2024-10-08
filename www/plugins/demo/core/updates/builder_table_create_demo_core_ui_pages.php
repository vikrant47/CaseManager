<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreUiPages extends Migration
{
    public function up()
    {
        Schema::create('demo_core_ui_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable()->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code');
            $table->text('template');
            $table->uuid('engine_application_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_ui_pages');
    }
}
