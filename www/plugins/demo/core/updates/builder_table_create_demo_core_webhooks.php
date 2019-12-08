<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreWebhooks extends Migration
{
    public function up()
    {
        Schema::create('demo_core_webhooks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->text('description');
            $table->smallInteger('active');
            $table->text('url');
            $table->string('method');
            $table->text('request_headers')->nullable();
            $table->text('request_body')->nullable();
            $table->text('condition')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_webhooks');
    }
}
