<?php namespace Demo\Notification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoNotificationSubscribers extends Migration
{
    public function up()
    {
        Schema::create('demo_notification_subscribers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('subscriber_id');
            $table->integer('subscriber_group_id');
            $table->integer('plugin_id');
            $table->integer('notification_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_notification_subscribers');
    }
}
