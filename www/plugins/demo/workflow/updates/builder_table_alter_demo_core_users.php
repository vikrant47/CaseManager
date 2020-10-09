<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableAlterDemoCoreUsers extends Migration
{
    public function up()
    {
        Schema::table('backed_users', function ($table) {
            $table->uuid('demo_workflow_work_profile_id')->default(null);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_custom_fields');
    }
}
