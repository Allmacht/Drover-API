<?php

namespace Src\Contexts\OnboardingSession\Infrastructure\Http\Controllers;

use App\Exceptions\BaseException;
use Src\Contexts\OnboardingSession\Application\UseCases\StartModuleSelectionUseCase;
use Src\Contexts\OnboardingSession\Infrastructure\Http\Requests\OnboardingSessionStartRequest;

final class StartModuleSelectionController
{
    public function __construct(
        private StartModuleSelectionUseCase $startModuleSelection
    ) {
    }

    public function __invoke(OnboardingSessionStartRequest $request)
    {
        try {
            $sessionDTO = ($this->startModuleSelection)(
                company_id: $request->validated('company_id'),
                user_id: $request->user()->id
            );

            dd($sessionDTO);

        } catch (BaseException $e) {
            return response()->json($e->getBody(), $e->getCode());
        }
    }
}
