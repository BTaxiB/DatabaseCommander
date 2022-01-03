<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use PDOException;
use PDOStatement;

final class DeleteTableRowCommand extends AbstractCRUDCommand implements CommandInterface
{
    /**
     * @var int
     */
    private int $id;

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
        $statement = sprintf("DELETE FROM %s WHERE id = %d", $this->tableName, $this->id);
        return $this->connection->prepare($statement);
    }

    /**
     * @param int $id
     */
    public function withId(int $id)
    {
        $this->id = $id;
    }
}