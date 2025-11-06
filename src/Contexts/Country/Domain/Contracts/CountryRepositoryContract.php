<?php

namespace Src\Contexts\Country\Domain\Contracts;

interface CountryRepositoryContract
{
    public function getAllAvailableCountries(): array;
}
