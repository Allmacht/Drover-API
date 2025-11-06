<?php

namespace Src\Shared\Infrastructure\Persistence\Eloquent;

use Illuminate\Support\Facades\DB;
use Src\Shared\Domain\Contracts\TransactionManagerInterface;

class LaravelTransactionManager implements TransactionManagerInterface
{
    public function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    public function commit(): void
    {
        DB::commit();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }

    public function transaction(callable $callback): mixed
    {
        return DB::transaction($callback);
    }
}
