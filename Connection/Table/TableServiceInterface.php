<?php

namespace Database\Connection\Table;

use Database\Command\CommandStoreException;

interface TableServiceInterface
{
    /**
     * @return void;
     * @throws TableServiceException
     * @throws CommandStoreException
     */
    public function createTables(string $databaseName): void;
}