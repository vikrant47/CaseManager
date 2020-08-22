<?php namespace Demo\Tenant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoTenantTenants extends Migration
{
    public function up()
    {
        Schema::create('demo_tenant_tenants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->text('logo');
            $table->string('default_theme')->nullable()->default('engine-default');
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
        Schema::dropIfExists('demo_tenant_tenants');
    }
}
