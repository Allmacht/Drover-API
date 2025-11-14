<?php

namespace Src\Contexts\Country\Domain\Entities;

use Src\Contexts\Country\Domain\ValueObjects\CountryCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrency;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrencySymbol;
use Src\Contexts\Country\Domain\ValueObjects\CountryFlag;
use Src\Contexts\Country\Domain\ValueObjects\CountryId;
use Src\Contexts\Country\Domain\ValueObjects\CountryLocale;
use Src\Contexts\Country\Domain\ValueObjects\CountryName;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhoneCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhonePattern;
use Src\Contexts\Country\Domain\ValueObjects\CountryTimezone;

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
        public readonly CountryTimezone $timezone,
        public readonly CountryLocale $locale,
        public readonly CountryFlag $flag
    ) {}

    public function id(): CountryId
    {
        return $this->id;
    }

    public function name(): CountryName
    {
        return $this->name;
    }

    public function code(): CountryCode
    {
        return $this->code;
    }

    public function currency(): CountryCurrency
    {
        return $this->currency;
    }

    public function currency_symbol(): CountryCurrencySymbol
    {
        return $this->currency_symbol;
    }

    public function phone_code(): CountryPhoneCode
    {
        return $this->phone_code;
    }

    public function phone_pattern(): CountryPhonePattern
    {
        return $this->phone_pattern;
    }

    public function timezone(): CountryTimezone
    {
        return $this->timezone;
    }

    public function locale(): CountryLocale
    {
        return $this->locale;
    }

    public function flag(): CountryFlag
    {
        return $this->flag;
    }

    public static function create(
        CountryId $id,
        CountryName $name,
        CountryCode $code,
        CountryCurrency $currency,
        CountryCurrencySymbol $currency_symbol,
        CountryPhoneCode $phone_code,
        CountryPhonePattern $phone_pattern,
        CountryTimezone $timezone,
        CountryLocale $locale,
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
            timezone: $timezone,
            locale: $locale,
            flag: $flag,
        );
    }
}
