<?php namespace Demo\Reports\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoReportsReports extends Migration
{
    public function up()
    {
        Schema::create('demo_reports_reports', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->text('description');
            $table->text('script');
            $table->string('type');
            $table->string('script_type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_reports_reports');
    }
}
