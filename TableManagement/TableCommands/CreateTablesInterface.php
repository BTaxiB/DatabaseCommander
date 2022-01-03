<?php

namespace Database\TableManagement\TableCommands;

interface CreateTablesInterface
{
    /**
     * @param string $databaseName
     * @return CreateTablesCommand
     */
    public function withDatabaseName(string $databaseName): CreateTablesCommand;

     /**
     * @param string $scope
     * @return CreateTablesCommand
     */
    public function withScope(string $scope): CreateTablesCommand;
}