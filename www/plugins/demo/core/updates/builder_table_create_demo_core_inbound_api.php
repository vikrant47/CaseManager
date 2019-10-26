<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreInboundApi extends Migration
{
    public function up()
    {
        Schema::create('demo_core_inbound_api', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('method');
            $table->integer('plugin_id');
            $table->text('script');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('url');
            $table->smallInteger('active')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_inbound_api');
    }
}
