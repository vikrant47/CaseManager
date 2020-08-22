<?php namespace Demo\Report\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoReportWidgets extends Migration
{
    public function up()
    {
        Schema::create('demo_report_widgets', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->string('code');
            $table->string('description');
            $table->text('template');
            $table->text('data');
            $table->text('script');
            $table->boolean('public');
            $table->integer('plugin_id');
            $table->boolean('active')->default(true);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_report_widgets');
    }
}
