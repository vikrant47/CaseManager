<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreApplications extends Migration
{
    public function up()
    {
        Schema::create('demo_core_applications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name');
            $table->string('code');
            $table->string('plugin_code');
            $table->text('description')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable()->default(0);
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_applications');
    }
}
