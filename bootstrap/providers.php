<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RepositoryServiceProvider::class,
    Src\Contexts\Country\Infrastructure\CountryServiceProvider::class,
    Src\Contexts\Authorization\Infrastructure\AuthorizationServiceProvider::class,
    Src\Contexts\User\Infrastructure\UserServiceProvider::class,
    Src\Contexts\Company\Infrastructure\CompanyServiceProvider::class,
    Src\Contexts\Module\Infrastructure\ModuleServiceProvider::class,
];
