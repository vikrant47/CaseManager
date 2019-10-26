<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreCommands extends Migration
{
    public function up()
    {
        Schema::create('demo_core_commands', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_by_id');
            $table->integer('created_by_id');
            $table->string('name');
            $table->string('description');
            $table->string('slug');
            $table->smallInteger('active')->default(1);
            $table->text('arguments');
            $table->text('parameters');
            $table->text('script');
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_commands');
    }
}
