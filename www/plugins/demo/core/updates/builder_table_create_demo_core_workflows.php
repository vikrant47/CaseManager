<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreWorkflows extends Migration
{
    public function up()
    {
        Schema::create('demo_core_workflows', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('active')->default(1);
            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->text('definition');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_workflows');
    }
}
