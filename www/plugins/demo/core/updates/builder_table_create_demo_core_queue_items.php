<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreQueueItems extends Migration
{
    public function up()
    {
        Schema::create('demo_core_queue_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('queue_id');
            $table->integer('item_id');
            $table->string('item_type', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_queue_items');
    }
}
