<?php

namespace Database\Connection\Table\Manager;

interface TableManagerInterface
{
    /**
     * @return bool
     */
    public function create(): bool;

    /**
     * @param array $fields .
     * @return TableManagerInterface
     */
    public function setFields(array $fields): TableManagerInterface;

    /**
     * @return  array
     */
    public function getFields(): array;

    /**
     * @param string $name
     *
     * @return TableManagerInterface
     */
    public function setName(string $name): TableManagerInterface;

    /**
     * @return  string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return TableManagerInterface
     */
    public function setDatabaseName(string $name): TableManagerInterface;

    /**
     * @return  string
     */
    public function getDatabaseName(): string;
}