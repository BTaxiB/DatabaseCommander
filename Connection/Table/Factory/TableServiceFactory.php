<?php

namespace Database\Connection\Table\Factory;

use Database\Command\Factory\CommandStoreFactory;
use Database\Connection\Table\TableService;
use Database\Connection\Table\TableServiceInterface;

final class TableServiceFactory implements TableServiceFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function create(array $commands): TableServiceInterface
    {

    }
}