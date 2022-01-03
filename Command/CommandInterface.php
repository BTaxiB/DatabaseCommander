<?php

namespace Database\Command;

interface CommandInterface
{
    /**
     * @return mixed
     */
    public function execute(): mixed;
}
