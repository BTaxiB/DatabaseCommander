<?php

namespace Database\Command\Factory;

use Database\Command\CommandInterface;
use Database\Command\CommandStore;
use Database\Command\CommandStoreInterface;

final class CommandStoreFactory implements CommandStoreFactoryInterface
{
    /**
     * Construct CommandStore with array of commands.
     * @param CommandInterface[] $commands
     * @return CommandStoreInterface
     */
    public function create(array $commands): CommandStoreInterface
    {
        $commandStore = new CommandStore();

        foreach ($commands as $command) {
            $commandStore->addCommand($command);
        }

        return $commandStore;
    }
}