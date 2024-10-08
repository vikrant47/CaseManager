<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreNavRoleAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_view_role_associations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable()->default(0);
            $table->uuid('record_id');
            $table->string('model');
            $table->uuid('role_id');
            $table->uuid('engine_application_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_view_role_associations');
    }
}
