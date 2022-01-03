<?php

namespace Database\Connection;

use PDO;
use PDOException;

interface DatabaseServiceInterface
{
    /**
     * @param ConfigInterface $config
     * @return PDO
     * @throws PDOException
     */
    public function connectWithConfig(ConfigInterface $config): PDO;

    /**
     * @return PDO
     * @throws PDOException
     */
    public function connectToRoot(): PDO;

    /**
     * @return PDO
     * @throws DatabaseServiceException
     */
    public function connectForClient(): PDO;
}
