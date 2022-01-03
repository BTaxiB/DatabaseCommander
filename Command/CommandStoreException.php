<?php

namespace Database\Command;

use Database\TableManagement\TableCommands\AbstractCRUDCommand;
use Exception;

class CommandStoreException extends Exception
{
    /**
     * @param string $needle
     * @param CommandInterface[] $haystack
     * @return void
     * @throws CommandStoreException
     */
    public static function assertCommandExists(string $needle, array $haystack): void
    {
        if (!array_key_exists($needle, $haystack)) {
            throw new self(sprintf("Command not found with name: %s", $needle));
        }
    }

    /**
     * @param string $needle
     * @param AbstractCrudCommand[] $haystack
     * @return void
     * @throws CommandStoreException
     */
    public static function assertIsCommandCRUD(string $needle, array $haystack): void
    {
        if (!$haystack[$needle] instanceof AbstractCRUDCommand) {
            throw new self(sprintf("CRUD command not found with name: %s", $needle));
        }
    }
}