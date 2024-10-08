<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreEventHandlers extends Migration
{
    public function up()
    {
        Schema::create('demo_core_event_handlers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('event');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('model', 255);
            $table->text('script');
            $table->integer('sort_order');
            $table->boolean('active')->default(1);
            $table->uuid('engine_application_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_event_handlers');
    }
}
