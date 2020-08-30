<?php namespace Demo\Notification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoNotificationChannels extends Migration
{
    public function up()
    {
        Schema::create('demo_notification_channels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->text('script');
            $table->text('configuration')->nullable();
            $table->boolean('active')->default(1);
            $table->uuid('engine_application_id');
            $table->string('name');
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_notification_channels');
    }
}
