<?php

namespace Database\Command;

use Database\TableManagement\TableCommands\AbstractCRUDCommand;

interface CommandStoreInterface
{
    /**
     * @param CommandInterface $command
     */
    public function addCommand(CommandInterface $command);

    /**
     * @param string $commandName
     * @return CommandInterface
     * @throws CommandStoreException
     */
    public function getCommand(string $commandName): mixed;

    /**
     * @param string $commandName
     * @return AbstractCrudCommand
     * @throws CommandStoreException
     */
    public function getCRUDCommand(string $commandName): AbstractCRUDCommand;
}