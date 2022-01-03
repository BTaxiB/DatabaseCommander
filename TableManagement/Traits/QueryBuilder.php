<?php

namespace Database\TableManagement\Traits;

use PDOStatement;

trait QueryBuilder
{
    /**
     * @param PDOStatement $statement
     * @return PDOStatement
     */
    public function buildParameters(PDOStatement $statement): PDOStatement
    {
        foreach ($this->data as $key => $value) {
            $statement->bindParam(sprintf(":%s", $key), $value);
        }

        return $statement;
    }

    /**
     * @return string
     */
    public function buildPlaceholderString(): string
    {
        $placeholderString = '';

        foreach ($this->data as $key => $value) {
            $placeholderString .= sprintf("%s, ", $key);
        }

        return $placeholderString;
    }

    /**
     * @return string
     */
    public function buildColumnsString(): string
    {
        $columnString = '';

        foreach ($this->data as $key => $value) {
            $columnString .= sprintf("%s, ", $key);
        }

        return $columnString;
    }

    /**
     * @return string
     */
    public function buildColumnsStringForUpdate(): string
    {
        $updateStringColumns = '';

        foreach ($this->data as $key => $value) {
            $updateStringColumns .= sprintf("%s = %s", $key, $value);
        }

        return $updateStringColumns;
    }
}