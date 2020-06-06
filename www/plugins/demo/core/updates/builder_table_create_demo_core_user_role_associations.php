<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreUserRoleAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_user_role_associations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('user_id');
            $table->uuid('role_id');
            $table->integer('plugin_id');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_user_role_associations');
    }
}
