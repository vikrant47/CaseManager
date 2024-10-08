<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\CustomField;
use Demo\Workspace\Models\Workflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use timgws\QBPFunctions;
use timgws\QueryBuilderParser;
use Illuminate\Support\Facades\Schema;

class InMemoryQueryFilter extends QueryFilter
{

    protected $data;
    protected $tableNme;
    protected $sqLiteService;
    protected $schemaCreated = false;
    protected $dataInserted = false;

    /**@return integer returns a unique number respect of unix time */
    static function uniqueNumber()
    {
        $dt = new \DateTime();
        return $dt->getTimestamp();
    }

    /**
     * @param Collection $data List of data to be evaluated
     * @param array $rules The rules json
     * @param null $alias alias that should be included while creating query
     * @param array|null $fields fields to add in select statement
     * @param bool $eval Weather to eval or not
     */
    public function __construct($data, $alias = null, array $fields = null)
    {
        $this->data = $data;
        $this->sqLiteService = new SqlLiteService();
        parent::__construct(null, $alias);
        $this->sqLiteService->createConnection();
        $this->tableNme = 'temp_table_' . self::uniqueNumber();
    }

    public function init()
    {
        return $this->createSchema()->insertData();
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName)
    {
        $this->tableNme = $tableName;
    }

    /**This will return fieldName with type*/
    protected function getFields()
    {
        $fields = [];
        $record = $this->data->get(0);
        if ($record instanceof \Illuminate\Database\Eloquent\Model) {
            $record = $record->toArray();
        }
        foreach ($record as $field => $value) {
            $fields[$field] = SqlLiteService::phpToDoctrineType(gettype($value));
        }
        return $fields;
    }

    public function createSchema()
    {
        if ($this->schemaCreated === false) {
            $this->sqLiteService->createConnection();
            $this->sqLiteService->createSchema($this->tableNme, $this->getFields());
            $this->schemaCreated = true;
        }
        return $this;
    }

    /**This will sanitize the given data by converting it to array and removing all relational fields*/
    public function sanitizeData()
    {

    }

    public function insertData()
    {
        if ($this->dataInserted === false) {
            $records = $this->data->map(function ($record) {
                if ($record instanceof Model) {
                    $record = $record->toArray();
                }
                foreach ($record as $name => $value) {
                    if (is_array($value)) {
                        $record[$name] = json_encode($value);
                    }
                }
                return $record;
            });
            $this->sqLiteService->getConnection()->table($this->tableNme)->insert($records->toArray());
            $this->dataInserted = true;
        }
        return $this;
    }

    public function destroy($disconnect = true)
    {
        if ($disconnect === true) {
            $this->sqLiteService->closeConnection();
        }
    }

    /**
     * Create query for the given data
     * @return Builder
     */
    public function createQuery()
    {
        $this->setQuery($this->sqLiteService->getConnection()->table($this->tableNme));
        return $this->query;
    }

    /**This will return the matching entity
     * @param Collection $data
     * @param Collection<\stdClass> $entities
     * @param $conditionField
     */
    public static function findMatchingEntity($data, $entities, $conditionField = 'condition')
    {
        $matchedEntity = null;
        $inMemoryFilter = new InMemoryQueryFilter($data);
        $inMemoryFilter->init();
        foreach ($entities as $entity) {
            $query = $inMemoryFilter->createQuery();
            $inMemoryFilter->applyFilter($entity->{$conditionField});
            if ($query->count() > 0) {
                $matchedEntity = $entity;
                break;
            }
        }
        $inMemoryFilter->destroy();
        return $matchedEntity;
    }

}
