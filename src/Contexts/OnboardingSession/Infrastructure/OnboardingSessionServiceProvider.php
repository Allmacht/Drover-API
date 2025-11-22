<?php

namespace Src\Contexts\OnboardingSession\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Contexts\OnboardingSession\Domain\Contracts\OnboardingSessionRepositoryContract;
use Src\Contexts\OnboardingSession\Infrastructure\Persistence\Repositories\Eloquent\OnboardingSessionRepository;

class OnboardingSessionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(OnboardingSessionRepositoryContract::class, OnboardingSessionRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/OnboardingSession.php');
    }
}
