<?php

namespace Src\Contexts\Authorization\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\Authorization\Domain\Contracts\AuthorizationRepositoryContract;
use Src\Contexts\Authorization\Domain\Contracts\PermissionRepositoryContract;
use Src\Contexts\Authorization\Domain\Contracts\RoleRepositoryContract;
use Src\Contexts\Authorization\Infrastructure\Persistence\Repositories\Eloquent\AuthorizationRepository;
use Src\Contexts\Authorization\Infrastructure\Persistence\Repositories\Eloquent\PermissionRepository;
use Src\Contexts\Authorization\Infrastructure\Persistence\Repositories\Eloquent\RoleRepository;

class AuthorizationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthorizationRepositoryContract::class, AuthorizationRepository::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryContract::class, PermissionRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/Authorization.php');
    }
}
