<?php

namespace Src\Contexts\Module\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\Module\Domain\Contracts\ModuleRepositoryContract;
use Src\Contexts\Module\Infrastructure\Persistence\Repositories\Eloquent\ModuleRepository;

class ModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ModuleRepositoryContract::class, ModuleRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/Module.php');
    }
}
