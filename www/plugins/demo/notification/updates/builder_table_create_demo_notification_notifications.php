<?php namespace Demo\Notification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoNotificationNotifications extends Migration
{
    public function up()
    {
        Schema::create('demo_notification_notifications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('event', 255);
            $table->string('model', 255);
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->text('condition');
            $table->uuid('engine_application_id');
            $table->boolean('active');
            $table->boolean('enable_logging')->default(false);
            $table->uuid('template_id');
            $table->uuid('channel_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_notification_notifications');
    }
}
