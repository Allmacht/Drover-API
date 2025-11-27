<?php

namespace Src\Contexts\Company\Infrastructure\Http\Controllers;

use Illuminate\Http\Request;
use Src\Contexts\Company\Application\UseCases\GetCompaniesFromCurrentUserUseCase;
use Symfony\Component\HttpFoundation\Response;

final class GetCompaniesFromCurrentUserController
{
    public function __construct(
        private GetCompaniesFromCurrentUserUseCase $companies
    ) {
    }

    public function __invoke(Request $request): Response
    {
        $companiesDTO = ($this->companies)($request->user()->id);

        return response()->json(
            $companiesDTO,
            Response::HTTP_OK
        );
    }
}
