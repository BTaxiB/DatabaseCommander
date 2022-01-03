<?php

namespace Database\Connection\Table\Manager;

use Database\Connection\Connection;
use PDOException;

final class TableManager implements TableManagerInterface
{
    /**
     * @var string $name
     */
    protected string $name;

    /**
     * @var string $databaseName
     */
    protected string $databaseName;

    /**
     * @var array $fields
     */
    protected array $fields;

    /**
     * @var Connection
     */
    private Connection $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function create(): bool
    {
        $sql = sprintf("CREATE TABLE %s.%s %s", $this->getDatabaseName(), $this->getName(), $this->getFieldsAsString());
        $statement = $this->connection->prepare($sql);

        try {
            $statement->execute();
        } catch(PDOException $e) {
            echo sprintf("Failed to create table with error: %s", $e->getMessage());
        }

        return true;
    }

    function truncate()
    {
    }

    function dropTable()
    {
    }

    function setTable()
    {
    }

    function getTable()
    {
    }

    /**
     * @return string
     */
   private function getFieldsAsString(): string
    {
        $fields = "(";
        $array = $this->getFields();

        foreach ($array as $key => $value) {
            if (array_key_last($array) !== $key) {
                $fields .= sprintf("%s %s, ", $key, $value);
            } else {
                $fields .= sprintf("%s %s", $key, $value);
            }
        }

        return sprintf("%s)", $fields);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * @inheritDoc
     */
    public function setDatabaseName(string $name): TableManagerInterface
    {
        $this->databaseName = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @inheritDoc
     */
    public function setFields(array $fields): TableManagerInterface
    {
        $this->fields = $fields;

        return $this;
    }
}