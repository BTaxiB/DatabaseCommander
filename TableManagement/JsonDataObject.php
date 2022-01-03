<?php

namespace Database\TableManagement;

use JsonSerializable;

final class JsonDataObject implements JsonSerializable, DataObjectInterface
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @inheritDoc
     * @throws DataObjectException
     */
    public function jsonSerialize(): string|bool
    {
        $jsonData = json_encode($this->data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new DataObjectException(sprintf("Failed to serialize, error id: %i", json_last_error()));
        }

        return $jsonData;
    }

    /**
     * @inheritDoc
     */
    public function withData(array $data): JsonDataObject
    {
        $this->data = $data;

        return $this;
    }
}