<?php

namespace Src\Contexts\Country\Domain\Entities;

use Src\Contexts\Country\Domain\ValueObjects\CountryCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrency;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrencySymbol;
use Src\Contexts\Country\Domain\ValueObjects\CountryFlag;
use Src\Contexts\Country\Domain\ValueObjects\CountryId;
use Src\Contexts\Country\Domain\ValueObjects\CountryName;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhoneCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhonePattern;

final class Country
{
    private function __construct(
        public readonly CountryId $id,
        public readonly CountryName $name,
        public readonly CountryCode $code,
        public readonly CountryCurrency $currency,
        public readonly CountryCurrencySymbol $currency_symbol,
        public readonly CountryPhoneCode $phone_code,
        public readonly CountryPhonePattern $phone_pattern,
        public readonly CountryFlag $flag
    ) {}

    public static function create(
        CountryId $id,
        CountryName $name,
        CountryCode $code,
        CountryCurrency $currency,
        CountryCurrencySymbol $currency_symbol,
        CountryPhoneCode $phone_code,
        CountryPhonePattern $phone_pattern,
        CountryFlag $flag,
    ): static {
        return new self(
            id: $id,
            name: $name,
            code: $code,
            currency: $currency,
            currency_symbol: $currency_symbol,
            phone_code: $phone_code,
            phone_pattern: $phone_pattern,
            flag: $flag,
        );
    }
}
