<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerQueues extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_queues', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->text('description');
            $table->smallInteger('active')->default(1);
            $table->smallInteger('virtual')->default(1);
            $table->string('queue_order', 255);
            $table->string('sort_order', 255);
            $table->text('script');
            $table->text('input_condition');
            $table->string('supported_items_type',255);
            $table->string('redundancy_policy',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_queues');
    }
}
