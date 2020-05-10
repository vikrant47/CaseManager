<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreNavRoleAssociations extends Migration
{
    public function up()
    {
        Schema::create('demo_core_nav_role_associations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->nullable();
            $table->integer('navigation_id');
            $table->integer('role_id');
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_nav_role_associations');
    }
}
