<?php

namespace Src\Contexts\User\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Infrastructure\Persistence\Repositories\Eloquent\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/User.php');
    }
}
