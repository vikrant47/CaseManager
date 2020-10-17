<?php


namespace Demo\Core\Services;


use Illuminate\Database\Connection;
use Illuminate\Database\Schema\SQLiteBuilder;
use Illuminate\Support\Facades\Schema;

class SqlLiteService
{
    const SQLITE_MEM_CONNECTION = 'sqlite_memory';
    /**@var $connection Connection */
    protected $connection;

    public static function phpToDoctrineType($phpType)
    {
        if ($phpType === 'NULL' || $phpType === null || $phpType === "unknown type" || $phpType === 'resource') {
            return 'string';
        }
        if ($phpType === 'array' || $phpType === 'object') {
            return 'jsonb';
        }
        return $phpType;
    }


    public function createConnection()
    {
        if (empty($this->connection) || !$this->connection->getDoctrineConnection()->isConnected()) {
            $this->connection = Schema::connection(SqlLiteService::SQLITE_MEM_CONNECTION)->getConnection();
        }
        return $this->connection;
    }

    /**@return Connection */
    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->disconnect();
        return $this;
    }

    /**Create schema for the given data*/
    public function createSchema($tableNme, $fields)
    {
        $this->connection->getSchemaBuilder()->create($tableNme, function ($table) use ($fields) {
            foreach ($fields as $field => $type) {
                $table->{$type}($field)->nullable();
            }
        });
        return $this;
    }
}
