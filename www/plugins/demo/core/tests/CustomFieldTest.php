<?php


namespace Demo\Core\Tests;


use Demo\Casemanager\Models\CaseModel;
use Demo\Core\Models\CustomField;
use Demo\Core\Models\InboundApi;
use Doctrine\DBAL\Schema\Table;

/**
 * Test Cases to be added
 * It should create a new custom field -> column should be created in column
 * It should update a custom filed -> table can not be updated.
 * Value can be saved in the field
 */
class CustomFieldTest extends PluginTestSetup
{
    public function testCustomFieldCreate()
    {
        $columnName = 'test_' . $this->getCurrentTimestamp();
        $customField = CustomField::create([
            'name' => $columnName,
            'type' => 'string',
            'model' => InboundApi::class
        ]);
        $this->assertNotEmpty($customField->id);
        $this->assertAuditableFields($customField);
        $inboundApiModel = new InboundApi();
        $apiTable = new Table($inboundApiModel->table);
        $this->assertArrayHasKey($columnName, $apiTable->getColumns());
    }
}