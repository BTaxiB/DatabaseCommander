<?php

namespace Database\Connection;

final class Config implements ConfigInterface
{
    /**
     * @var string
     */
    private string $dbUser;

    /**
     * @var mixed
     */
    private mixed $dbPass;

    /**
     * @var string
     */
    private string $dbName;

    /**
     * @inheritDoc
     */
    public function setConfig(array $config): void
    {
        $this->dbUser = $config['username'] ?? null;
        $this->dbPass = $config['password'] ?? null;
        $this->dbName = $config['dbName'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        ConfigException::assertDBUserValueExists($this);
        return $this->dbUser;
    }

    /**
     * @inheritDoc
     */
    public function getPassword(): string
    {
        ConfigException::assertDBPasswordValueExists($this);
        return $this->dbPass;
    }

    /**
     * @inheritDoc
     */
    public function getDatabaseName(): string
    {
        ConfigException::assertDBNameValueExists($this);
        return $this->dbName;
    }
}