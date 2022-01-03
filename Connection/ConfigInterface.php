<?php

namespace Database\Connection;

interface ConfigInterface
{
    /**
     * @return string
     * @throws ConfigException
     */
    public function getUsername(): string;

    /**
     * @return string
     * @throws ConfigException
     */
    public function getPassword(): string;

    /**
     * @return string
     * @throws ConfigException
     */
    public function getDatabaseName(): string;

    /**
     * @param array $config
     * @return void
     */
    public function setConfig(array $config): void;
}