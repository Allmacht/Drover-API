<?php

namespace Src\Contexts\Country\Infrastructure\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Contexts\Country\Application\UseCases\GetAvailableCountriesUseCase;
use Src\Contexts\Country\Infrastructure\Persistence\Mappers\CountryJsonApiMapper;

class GetAllAvailableCountriesController
{
    public function __construct(private readonly GetAvailableCountriesUseCase $getAvailableCountriesUseCase) {}

    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(
            CountryJsonApiMapper::toCollection(
                countriesDTO: ($this->getAvailableCountriesUseCase)(),
                baseUrl: $request->getSchemeAndHttpHost()
            ),
            JsonResponse::HTTP_OK
        );
    }
}
