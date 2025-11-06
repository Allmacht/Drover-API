<?php

namespace Src\Shared\Domain\Contracts;

interface TransactionManagerInterface
{
    public function beginTransaction(): void;

    public function commit(): void;

    public function rollback(): void;

    public function transaction(callable $callback): mixed;
}
