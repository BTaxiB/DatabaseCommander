<?php

namespace Database\Connection\Table\Factory;

use Database\Connection\Table\TableServiceInterface;

interface TableServiceFactoryInterface
{
    /**
     * @param array $commands
     * @return TableServiceInterface
     * @throws OutsourceFactoryProviderException
     */
    public function create(array $commands): TableServiceInterface;
}