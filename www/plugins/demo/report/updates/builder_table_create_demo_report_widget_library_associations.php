<?php namespace Demo\Report\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoReportWidgetLibraryAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_report_widget_library_associations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->uuid('engine_application_id');
            $table->uuid('widget_id');
            $table->uuid('library_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_report_widget_library_associations');
    }
}
