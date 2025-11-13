<?php

namespace Src\Contexts\Authorization\Infrastructure\Http\Controllers;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;
use Src\Contexts\Authorization\Application\UseCases\SignInUseCase;
use Src\Contexts\Authorization\Infrastructure\Http\Requests\SignInRequest;
use Src\Contexts\Authorization\Infrastructure\Persistence\Mappers\AuthorizationJsonApiMapper;

final class SignInController
{
    public function __construct(
        private SignInUseCase $signInUseCase
    ) {}

    public function __invoke(SignInRequest $request): JsonResponse
    {
        try {

            $token = ($this->signInUseCase)(
                email: $request->validated('email'),
                password: $request->validated('password')
            );

            return response()->json(
                AuthorizationJsonApiMapper::toResource(token: $token),
                JsonResponse::HTTP_OK
            );

        } catch (BaseException $e) {
            return response()->json($e->getBody(), $e->getCode());
        }
    }
}
