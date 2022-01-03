<?php

namespace Database\Connection;

use PDO;
use PDOException;

final class Connection extends PDO
{
    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        try {
            parent::__construct(
                'mysql:host=localhost;dbname=' . $config->getDatabaseName() . ';charset=utf8',
                $config->getUsername(),
                $config->getPassword()
            );
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo sprintf('Connection failed: %s', $e->getMessage());
        }
    }
}