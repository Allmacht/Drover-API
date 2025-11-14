<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

enum CompanyTaxIdType: string
{
    case RFC = 'RFC';
    case RUC = 'RUC';
    case CUIT = 'CUIT';
    case EIN = 'EIN';
    case NIT = 'NIT';
    case OTHER = 'OTHER';

    public function value(): string
    {
        return $this->value;
    }

    public function label(): string
    {
        return match ($this) {
            self::RFC => 'RFC',
            self::RUC => 'RUC',
            self::CUIT => 'CUIT',
            self::EIN => 'EIN',
            self::NIT => 'NIT',
            self::OTHER => 'OTHER',
        };
    }

    public static function fromString(string $value): self
    {
        return self::from($value);
    }
}
