<?php

namespace Src\Contexts\Country\Infrastructure\Persistence\Mappers;

use Src\Contexts\Country\Application\DTOs\CountryDTO;

final class CountryJsonApiMapper
{
    public static function toCollection(array $countriesDTO, string $baseUrl): array
    {
        return [
            'data' => array_map(
                fn (CountryDTO $countryDTO) => self::toResource(dto: $countryDTO, baseUrl: $baseUrl),
                $countriesDTO
            ),
        ];
    }

    public static function toResource(CountryDTO $dto, string $baseUrl): array
    {
        return [
            'type' => 'countries',
            'id' => $dto->id,
            'attributes' => [
                'name' => $dto->name,
                'code' => $dto->code,
                'currency' => $dto->currency,
                'currency_symbol' => $dto->currency_symbol,
                'phone_code' => $dto->phone_code,
                'phone_pattern' => $dto->phone_pattern,
                'flag' => $dto->flag,
            ],

            'links' => [
                'self' => $baseUrl.'/api/countries/'.$dto->id,
            ],
        ];
    }
}
