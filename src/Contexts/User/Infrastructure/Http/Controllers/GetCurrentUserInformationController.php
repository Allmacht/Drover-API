<?php

namespace Src\Contexts\User\Infrastructure\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Contexts\User\Application\UseCases\GetCurrentUserUseCase;
use Src\Contexts\User\Infrastructure\Persistence\Mappers\CompleteUserJsonApiMapper;

final class GetCurrentUserInformationController
{
    public function __construct(
        private GetCurrentUserUseCase $getCurrentUserUseCase
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $userDTO = ($this->getCurrentUserUseCase)(user_id: $request->user()->id);

        return response()->json(
            CompleteUserJsonApiMapper::toJsonApi($userDTO, $request->getSchemeAndHttpHost()),
            JsonResponse::HTTP_OK
        );
    }
}
