<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use PDOException;
use PDOStatement;

final class InsertTableRowCommand extends AbstractCRUDCommand implements CommandInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): bool
    {
        $statement = $this->prepareSQLStatement();
        $statement = $this->buildParameters($statement);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    protected function prepareSQLStatement(): false|PDOStatement
    {
        $columnString = $this->buildColumnsString();
        $placeholderString = $this->buildPlaceholderString();
        $statement = sprintf("INSERT INTO %s (%s) VALUES (%s)", $this->tableName, $columnString, $placeholderString);

        return $this->connection->prepare($statement);
    }
}