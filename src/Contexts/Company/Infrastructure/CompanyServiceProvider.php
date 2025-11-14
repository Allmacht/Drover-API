<?php

namespace Src\Contexts\Company\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\Contexts\Company\Infrastructure\Persistence\Repositories\Eloquent\CompanyRepository;

class CompanyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CompanyRepositoryContract::class, CompanyRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/Company.php');
    }
}
