<?php

namespace Src\Contexts\Company\Infrastructure\Http\Controllers;

use App\Exceptions\BaseException;
use Src\Contexts\Company\Infrastructure\Persistence\Mappers\CompanyJsonApiMapper;
use Symfony\Component\HttpFoundation\Response;
use Src\Contexts\Company\Application\UseCases\CreateCompanyUseCase;
use Src\Contexts\Company\Infrastructure\Http\Requests\CreateCompanyRequest;

final class CreateCompanyController
{
    public function __construct(
        private readonly CreateCompanyUseCase $companyUseCase
    ) {
    }

    public function __invoke(CreateCompanyRequest $request)
    {
        try {

            $company_dto = ($this->companyUseCase)(
                name: $request->name,
                owner_id: $request->user()->id
            );

            return response()->json(
                data: CompanyJsonApiMapper::toResource($company_dto, $request->getSchemeAndHttpHost()),
                status: Response::HTTP_CREATED
            );

        } catch (BaseException $e) {
            return response()->json($e->getBody(), $e->getCode());
        }
    }
}
