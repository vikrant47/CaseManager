<?php namespace Demo\Workspace\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableAlterDemoCoreUsers extends Migration
{
    public function up()
    {
        Schema::table('backend_users', function ($table) {
            $table->uuid('demo_workspace_work_profile_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_custom_fields');
    }
}
