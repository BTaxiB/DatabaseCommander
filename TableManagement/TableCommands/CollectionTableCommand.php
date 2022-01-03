<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use PDOException;
use PDOStatement;

final class CollectionTableCommand extends AbstractCRUDCommand implements CommandInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): ?array
    {
        $statement = $this->prepareSQLStatement();

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement->fetchAll() ?? null;
    }

    /**
     * @inheritDoc
     */
    protected function prepareSQLStatement(): false|PDOStatement
    {
        $statement = sprintf("SELECT * FROM %s", $this->tableName);
        return $this->connection->prepare($statement);
    }
}