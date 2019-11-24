<?php


namespace Demo\Core\Tests;


use Demo\Core\Models\InboundApi;

class InboundApiTest extends PluginTestSetup
{
    public function testInboundApi()
    {
        $inboundApi = InboundApi::create([
            'name' => 'Test Inbound API',
            'url' => '/test/{hello}',
            'method' => 'get',
            'script' => 'return ["print"=>"Hello World"]',
            'plugin_id' => 10
        ]);
        $this->assertNotEmpty($inboundApi->id);
        $this->assertAuditableFields($inboundApi);
        /*$response = $this->json('GET', '/inbound-api/demo-core/test/hello-world');
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'print' => 'Hello World',
            ]);*/
    }
}