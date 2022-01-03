<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use PDOException;
use PDOStatement;

final class ShowTableRowCommand extends AbstractCRUDCommand implements CommandInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @inheritDoc
     */
    public function execute(): ?array
    {
        $statement = $this->prepareSQLStatement();

        try {
            $statement->execute();
            $record = $statement->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $record ?? null;
    }

    /**
     * @inheritDoc
     */
    protected function prepareSQLStatement(): false|PDOStatement
    {
        $statement = sprintf("SELECT * FROM %s WHERE id = %d LIMIT 1", $this->tableName, $this->id);
        return $this->connection->prepare($statement);
    }

    /**
     * @param int $id
     * @return void
     */
    public function withId(int $id): void
    {
        $this->id = $id;
    }
}