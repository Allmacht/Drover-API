<?php

namespace Src\Contexts\OnboardingSession\Infrastructure\Http\Controllers;

use Src\Contexts\OnboardingSession\Infrastructure\Http\Requests\OnboardingSessionStartRequest;

final class StartModuleSelectionController
{
    public function __construct(
    ) {}

    public function __invoke(OnboardingSessionStartRequest $request)
    {
        dd($request);
    }
}
