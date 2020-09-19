<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreWebhookEndpoints extends Migration
{
    public function up()
    {
        Schema::create('demo_core_webhook_endpoints', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->uuid('created_by_id');
            $table->uuid('updated_by_id');
            $table->uuid('webhook_id');
            $table->uuid('engine_application_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('version');
            $table->text('url');
            $table->text('override_url');
            $table->boolean('active')->default(false);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('method');
            $table->text('headers')->nullable();
            $table->text('body');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_webhook_endpoints');
    }
}
