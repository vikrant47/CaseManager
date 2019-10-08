<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerQueueAssignmentGroups extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_queue_assignment_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('group_id');
            $table->integer('queue_id');
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_queue_assignment_groups');
    }
}
