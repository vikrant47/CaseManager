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
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_d');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->text('template');
            $table->text('data');
            $table->text('script');
            $table->smallInteger('public');
            $table->string('library');
            $table->integer('plugin_id');
            $table->integer('active');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_report_widgets');
    }
}
