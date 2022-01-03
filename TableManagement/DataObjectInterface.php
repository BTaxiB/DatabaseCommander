<?php

namespace Database\TableManagement;

interface DataObjectInterface
{
    /**
     * @param array $data
     * @return JsonDataObject
     */
    public function withData(array $data): JsonDataObject;
}