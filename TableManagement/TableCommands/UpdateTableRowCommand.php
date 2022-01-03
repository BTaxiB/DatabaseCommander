<?php

namespace Database\TableManagement\TableCommands;

use Database\Command\CommandInterface;
use PDOException;
use PDOStatement;

final class UpdateTableRowCommand extends AbstractCRUDCommand implements CommandInterface
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
        $columns = $this->buildColumnsStringForUpdate();
        $statement = sprintf("UPDATE %s SET {$columns}) WHERE id = %d", $this->tableName, $this->id);

        return $this->connection->prepare($statement);
    }

    /**
     * @param int $id
     * @return UpdateTableRowCommand
     */
    public function withId(int $id): UpdateTableRowCommand
    {
        $this->id = $id;

        return $this;
    }
}