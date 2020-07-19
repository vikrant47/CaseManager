<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoReportWidgets implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widgets')->insert([
            [
                                                                            "created_at"=>"2020-06-23 04:16:10",
                                                                                        "updated_at"=>"2020-06-23 05:21:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Agent Productivity - {{db.query('backend_user').where('id',request.param.userId).first()}}",
                                                                                        "code"=>"agent-productivity-dbquerybackend_userwhereidrequestparamuseridfirst",
                                                                                        "description"=> "",
                                                                                        "template"=> "",
                                                                                        "data"=>"return [\r\n    'data'=> \$context->evalSql('SELECT * from backend_user where id = {{request.param.userId}}'),\r\n    'user'=> Db::table('backend_user')->where('id',\$context->request->get('userId')),\r\n];",
                                                                                        "script"=>"this.header.setTitle(this.store.user.email);",
                                                                                        "public"=> 0,
                                                                                        "plugin_id"=> 3,
                                                                                        "active"=> 1,
                                                                                        "id"=>"44778960-b508-11ea-bbc1-096310b9696e",
                                                                                        "library_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 3)->delete();
            }
}
