<?php

namespace Database\TableManagement\TableCommands;

use Database\TableManagement\DataObjectException;
use Database\TableManagement\JsonDataObject;
use Database\TableManagement\Traits\QueryBuilder;
use PDO;
use PDOStatement;

abstract class AbstractCRUDCommand
{
    use QueryBuilder;

    protected string $tableName;
    protected mixed $data;
    private JsonDataObject $jsonDataObject;
    protected PDO $connection;

    /**
     * @param JsonDataObject $jsonDataObject
     * @param PDO $connection
     */
    public function __construct(JsonDataObject $jsonDataObject, PDO $connection)
    {
        $this->jsonDataObject = $jsonDataObject;
        $this->connection = $connection;
    }

    /**
     * @param string $tableName
     * @return AbstractCRUDCommand
     */
    public function withTableName(string $tableName): AbstractCRUDCommand
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function withData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return JsonDataObject
     * @throws DataObjectException
     */
    public function getJsonData(): JsonDataObject
    {
        if (count($this->data) > 0) {
            return $this->jsonDataObject
                ->withData($this->data)
                ->jsonSerialize();
        }
    }

    /**
     * @return false|PDOStatement
     */
    abstract protected function prepareSQLStatement(): false|PDOStatement;
}