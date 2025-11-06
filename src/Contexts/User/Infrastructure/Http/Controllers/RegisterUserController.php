<?php

namespace Src\Contexts\User\Infrastructure\Http\Controllers;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;
use Src\Contexts\User\Application\UseCases\RegisterUserUseCase;
use Src\Contexts\User\Infrastructure\Http\Requests\RegisterUserRequest;
use Src\Contexts\User\Infrastructure\Persistence\Mappers\UserJsonApiMapper;

final class RegisterUserController
{
    public function __construct(
        private RegisterUserUseCase $registerUserUseCase
    ) {}

    public function __invoke(RegisterUserRequest $request)
    {
        try {

            $userDTO = ($this->registerUserUseCase)(
                $request->input('names'),
                $request->input('email'),
                $request->input('password'),
                $request->input('phone'),
                $request->input('country_id')
            );

            return response()->json(
                UserJsonApiMapper::toResource($userDTO, $request->getSchemeAndHttpHost()),
                JsonResponse::HTTP_CREATED
            );

        } catch (BaseException $e) {
            return response()->json($e->getBody(), $e->getCode());
        }
    }
}