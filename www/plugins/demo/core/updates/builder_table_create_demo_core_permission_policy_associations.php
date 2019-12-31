<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCorePermissionPolicyAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_permission_policy_associations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('plugin_id');
            $table->integer('permission_id');
            $table->integer('policy_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_permission_policy_associations');
    }
}
