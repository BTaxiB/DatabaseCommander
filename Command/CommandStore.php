<?php

namespace Database\Command;

use Database\TableManagement\TableCommands\AbstractCRUDCommand;

final class CommandStore implements CommandStoreInterface
{
    /**
     * @var CommandInterface[]|AbstractCRUDCommand[]
     */
    private array $commands;

    /**
     * @inheritDoc
     */
    public function addCommand(CommandInterface $command)
    {
        $this->commands[$command::class] = $command;
    }

    /**
     * @inheritDoc
     */
    public function getCommand(string $commandName): CommandInterface
    {
        CommandStoreException::assertCommandExists($commandName, $this->commands);
        return $this->commands[$commandName];
    }

    /**
     * @inheritDoc
     */
    public function getCRUDCommand(string $commandName): AbstractCRUDCommand
    {
        CommandStoreException::assertCommandExists($commandName, $this->commands);
        CommandStoreException::assertIsCommandCRUD($commandName, $this->commands);
        return $this->commands[$commandName];
    }
}