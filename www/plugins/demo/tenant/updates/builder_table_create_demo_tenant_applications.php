<?php namespace Demo\Tenant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoTenantApplications extends Migration
{
    public function up()
    {
        Schema::create('demo_tenant_applications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->uuid('tenant_id');
            $table->integer('application_id');
            $table->boolean('active');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('version')->default(0);
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_tenant_applications');
    }
}
