<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBackendUsers extends Migration
{
    public function up()
    {
        Schema::table('backend_users', function ($table) {
            $table->uuid('demo_workflow_work_profile_id')->default('bcab2580-0649-11eb-b27d-b305dee8a6da');
        });
    }

    public function down()
    {
        Schema::table('backend_users', function ($table) {
            $table->dropColumn('demo_workflow_work_profile_id');
        });
    }
}
