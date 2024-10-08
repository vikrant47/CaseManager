<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreSecurityPolicies extends Migration
{
    public function up()
    {
        Schema::create('demo_core_security_policies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->text('description');
            $table->uuid('engine_application_id');

            // Index definitions
            $table->unique('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_core_security_policies');
    }
}
