<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableAlterDemoCoreUsers extends Migration
{
    public function up()
    {
        Schema::table('backend_users', function ($table) {
            $table->string('full_name')->nullable();
            $table->integer('created_by_id')->default(1);
            $table->integer('updated_by_id')->default(1);
            $table->integer('version')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('backend_users');
    }
}
