<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableAlterDemoCoreUsers extends Migration
{
    public function up()
    {
        Schema::table('backed_users', function ($table) {
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_custom_fields');
    }
}
