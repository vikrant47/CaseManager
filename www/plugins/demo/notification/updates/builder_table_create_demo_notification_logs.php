<?php namespace Demo\Notification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoNotificationLogs extends Migration
{
    public function up()
    {
        Schema::create('demo_notification_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('notification_id');
            $table->boolean('delivered')->default(false);
            $table->text('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_notification_logs');
    }
}
