<?php

namespace Src\Contexts\Module\Infrastructure\Http\Controllers;

use Illuminate\Http\Request;
use Src\Contexts\Module\Application\UseCases\FindModulesUseCase;
use Src\Contexts\Module\Infrastructure\Persistence\Mappers\ModuleJsonApiMapper;
use Symfony\Component\HttpFoundation\Response;

final class GetModulesController
{
    public function __construct(
        private readonly FindModulesUseCase $findModulesUseCase
    ) {
    }

    public function __invoke(Request $request): Response
    {
        $modules_dto = ($this->findModulesUseCase)();

        return response()->json(
            ModuleJsonApiMapper::toCollection($modules_dto, $request->fullUrl()),
            Response::HTTP_OK
        );
    }
}
