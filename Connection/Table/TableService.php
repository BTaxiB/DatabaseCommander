<?php

namespace Database\Connection\Table;

use Database\Command\CommandInterface;
use Database\Command\CommandStore;
use Database\TableManagement\TableCommands\CreateTablesCommand;

final class TableService implements TableServiceInterface
{
    /**
     * @var CommandStore
     */
    private CommandStore $commandStore;

    /**
     * @param CommandStore $commandStore
     */
    public function __construct(CommandStore $commandStore)
    {
        $this->commandStore = $commandStore;
    }

    /**
     * @inheritDoc
     */
    public function createTables(string $databaseName): void
    {
        $createTablesCommand = $this->commandStore->getCommand(CreateTablesCommand::class);
        $tablesScope = array_merge(Scopes::CLIENT_TABLE_SCOPE);

        foreach ($tablesScope as $scope) {
           $this->createTable($createTablesCommand, $scope, $databaseName);
        }
    }

    /**
     * @param CreateTablesCommand $createTablesCommand
     * @param string $scope
     * @param string $databaseName
     * @throws TableServiceException
     */
    private function createTable(CommandInterface $createTablesCommand, string $scope, string $databaseName): void
    {
        $status = $createTablesCommand
            ->withScope($scope)
            ->withDatabaseName($databaseName)
            ->execute();

        if (!$status) {
            throw new TableServiceException(sprintf("Failed to migrate: %s", $scope));
        }
    }
}