<?php namespace Demo\Report\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoReportDashboards extends Migration
{
    public function up()
    {
        Schema::create('demo_report_dashboards', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->text('widgets_config');
            $table->boolean('public');
            $table->string('code');
            $table->uuid('engine_application_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_report_dashboards');
    }
}
