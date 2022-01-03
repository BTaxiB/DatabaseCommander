<?php

namespace Database\Connection;

final class ConfigException extends \Exception
{
    /**
     * @param ConfigInterface $config
     * @return void
     * @throws ConfigException
     */
    public static function assertDBUserValueExists(ConfigInterface $config): void
    {
        if ($config->getUsername() === "") {
            throw new self("Database user value is missing.");
        }
    }

    /**
     * @param ConfigInterface $config
     * @return void
     * @throws ConfigException
     */
    public static function assertDBPasswordValueExists(ConfigInterface $config): void
    {
        if ($config->getPassword() === "") {
            throw new self("Database password value is missing.");
        }
    }

    /**
     * @param ConfigInterface $config
     * @return void
     * @throws ConfigException
     */
    public static function assertDBNameValueExists(ConfigInterface $config): void
    {
        if ($config->getDatabaseName() === "") {
            throw new self("Database name value is missing.");
        }
    }

}