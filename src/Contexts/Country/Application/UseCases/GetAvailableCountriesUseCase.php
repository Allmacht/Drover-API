<?php

namespace Src\Contexts\Country\Application\UseCases;

use Src\Contexts\Country\Application\DTOs\CountryDTO;
use Src\Contexts\Country\Domain\Contracts\CountryRepositoryContract;
use Src\Contexts\Country\Domain\Entities\Country;

final class GetAvailableCountriesUseCase
{
    public function __construct(
        private CountryRepositoryContract $countryRepository
    ) {}

    public function __invoke(): array
    {
        $data = $this->countryRepository->getAllAvailableCountries();

        return array_map(fn (Country $country) => CountryDTO::fromEntity($country), $data);
    }
}
