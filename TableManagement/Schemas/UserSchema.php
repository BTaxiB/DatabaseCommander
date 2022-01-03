<?php

namespace Database\TableManagement\Schemas;

final class UserSchema extends AbstractSchema
{
    const TABLE_NAME = 'user';
    public string $table = 'user';
    public array $fields = [
        'id' => 'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
        'name' => 'VARCHAR(255)',
        'username' => 'VARCHAR(255)',
        'password' => 'VARCHAR(255)'
    ];
}