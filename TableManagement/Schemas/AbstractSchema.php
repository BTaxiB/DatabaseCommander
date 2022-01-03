<?php

namespace Database\TableManagement\Schemas;

abstract class AbstractSchema
{
    protected string $table;
    protected array $fields;

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->table;
    }

    /**
     * @return array
     */
    public function getTableFields(): array
    {
        return $this->fields;
    }
}