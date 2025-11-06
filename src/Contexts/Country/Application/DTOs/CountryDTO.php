<?php

namespace Src\Contexts\Country\Application\DTOs;

use Src\Contexts\Country\Domain\Entities\Country;

/**
 * Class to represent a country
 */
final class CountryDTO
{
    /**
     * @var string The country id
     * @var string The country name
     * @var string The country code
     * @var string The country currency
     * @var string The country currency symbol
     * @var string The country phone code
     * @var string The country phone pattern
     * @var string The country flag
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $code,
        public readonly string $currency,
        public readonly string $currency_symbol,
        public readonly string $phone_code,
        public readonly string $phone_pattern,
        public readonly string $flag
    ) {}

    /**
     * Create a CountryDTO from a Country entity
     *
     * @param  Country  $country  The country entity
     * @return CountryDTO The CountryDTO
     */
    public static function fromEntity(Country $country): self
    {
        return new self(
            id: $country->id->value(),
            name: $country->name->value(),
            code: $country->code->value(),
            currency: $country->currency->value(),
            currency_symbol: $country->currency_symbol->value(),
            phone_code: $country->phone_code->value(),
            phone_pattern: $country->phone_pattern->value(),
            flag: $country->flag->value()
        );
    }
}
