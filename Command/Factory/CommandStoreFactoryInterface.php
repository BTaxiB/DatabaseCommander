<?php

namespace Database\Command\Factory;

use Database\Command\CommandInterface;
use Database\Command\CommandStoreInterface;

interface CommandStoreFactoryInterface
{
     /**
     * Construct CommandStore with array of commands.
     * @param CommandInterface[] $commands
     * @return CommandStoreInterface
     */
    public function create(array $commands): CommandStoreInterface;
}