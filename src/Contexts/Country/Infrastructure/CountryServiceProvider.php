<?php

namespace Src\Contexts\Country\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\Country\Domain\Contracts\CountryRepositoryContract;
use Src\Contexts\Country\Infrastructure\Persistence\Repositories\Eloquent\CountryRepository;

class CountryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CountryRepositoryContract::class, CountryRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/Country.php');
    }
}
