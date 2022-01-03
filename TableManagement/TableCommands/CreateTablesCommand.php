<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use Database\Connection\Table\Manager\TableManagerInterface;
use Database\TableManagement\Schemas\AbstractSchema;
use Database\TableManagement\Schemas\SchemaProvider;

final class CreateTablesCommand implements CommandInterface, CreateTablesInterface
{
    /**
     * @var TableManagerInterface
     */
    private TableManagerInterface $tableManager;

    /**
     * @var SchemaProvider
     */
    protected SchemaProvider $schemaProvider;

    /**
     * @var string
     */
    private string $databaseName;

    /**
     * @var string
     */
    private string $scope;

    /**
     * @param TableManagerInterface $tableManager
     * @param SchemaProvider $schemaProvider
     */
    public function __construct(TableManagerInterface $tableManager, SchemaProvider $schemaProvider)
    {
        $this->tableManager = $tableManager;
        $this->schemaProvider = $schemaProvider;
    }

    /**
     * @inheritDoc
     */
    public function withDatabaseName(string $databaseName): CreateTablesCommand
    {
        $this->databaseName = $databaseName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function execute(): bool
    {
        $schema = $this->schemaProvider->getSchema($this->scope);

        return $this->createTable($schema);
    }

    /**
     * @param AbstractSchema $schema
     * @return bool
     */
    private function createTable(AbstractSchema $schema): bool
    {
        return $this->tableManager
            ->setName($schema->getTableName())
            ->setDatabaseName($this->databaseName)
            ->setFields($schema->getTableFields())
            ->create();
    }

    /**
     * @inheritDoc
     */
    public function withScope(string $scope): CreateTablesCommand
    {
        $this->scope = $scope;

        return $this;
    }
}