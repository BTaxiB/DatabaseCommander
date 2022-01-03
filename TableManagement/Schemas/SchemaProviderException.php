<?php

namespace Database\TableManagement\Schemas;

use OutOfRangeException;

final class SchemaProviderException extends OutOfRangeException
{
    /**
     * @param AbstractSchema[] $schemas
     * @param string $key
     * @return void
     * @throw SchemaProviderException
     */
    public static function assertSchemaExists(array $schemas, string $key): void
    {
        if (!isset($schemas[$key])) {
            throw new self(sprintf("Schema with ID %s not found.", $key));
        }
    }
}