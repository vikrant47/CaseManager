<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreUiPage extends Migration
{
    public function up()
    {
        Schema::create('demo_core_ui_page', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code');
            $table->text('template');
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_ui_page');
    }
}
