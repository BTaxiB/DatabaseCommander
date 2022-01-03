<?php

namespace Database\Connection;

use PDO;

final class DatabaseService extends PDO implements DatabaseServiceInterface
{
    private const ROOT_DATABASE_NAME = 'projekat';
    private const ROOT_DATABASE_USERNAME = 'root';
    private const ROOT_DATABASE_PASSWORD = '';
    const ADMIN_CONFIG = [
        'username'  => self::ROOT_DATABASE_USERNAME,
        'password'  => self::ROOT_DATABASE_PASSWORD,
        'dbName'    => self::ROOT_DATABASE_NAME,
    ];

    /**
     * @inheritDoc
     */
    public function connectWithConfig(ConfigInterface $config): PDO
    {
        return new Connection($config);
    }

    /**
     * @inheritDoc
     */
    public function connectToRoot(): PDO
    {
        $config = new Config();
        $config->setConfig(self::ADMIN_CONFIG);

        return new Connection($config);
    }

    /**
     * @inheritDoc
     */
    public function connectForClient(): PDO
    {
        if (!isset($_SESSION['config'])) {
            throw new DatabaseServiceException('User connection data is missing!');
        }

        $config = new Config();
        $config->setConfig([
            'dbName'    => $_SESSION['config']['dbName'],
            'username'  => $_SESSION['config']['username'],
            'password'  => $_SESSION['config']['password'],
        ]);

        return new Connection($config);
    }
}