<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreAuditLogs extends Migration
{
    public function up()
    {
        Schema::create('demo_core_audit_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version');
            $table->string('model');
            $table->string('operation');
            $table->integer('record_id');
            $table->integer('record_id');
            $table->text('previous');
            $table->text('current')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_audit_logs');
    }
}
