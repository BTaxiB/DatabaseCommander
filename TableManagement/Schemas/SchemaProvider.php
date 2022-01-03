<?php

namespace Database\TableManagement\Schemas;

final class SchemaProvider
{
    /**
     * @var AbstractSchema[]
     */
    private array $schemas;

    /**
     * @param string $key
     * @param AbstractSchema $schema
     * @return void
     */
    public function addSchema(string $key, AbstractSchema $schema): void
    {
        $this->schemas[$key] = $schema;
    }

    /**
     * @param AbstractSchema[] $schemas
     * @return void
     */
    public function addSchemas(array $schemas): void
    {
        foreach ($schemas as $key => $schema) {
            $this->addSchema($key, $schema);
        }
    }

    /**
     * @param string $key
     * @return AbstractSchema
     */
    public function getSchema(string $key): AbstractSchema
    {
        SchemaProviderException::assertSchemaExists($this->schemas, $key);
        return $this->schemas[$key];
    }
}