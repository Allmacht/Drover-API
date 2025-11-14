<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

enum CompanySize: string
{
    case MICRO = '1-10';
    case SMALL = '11-50';
    case MEDIUM = '51-200';
    case LARGE = '201-500';
    case ENTERPRISE = '500+';

    public static function fromString(string $value): self
    {
        return self::from($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function label(): string
    {
        return match ($this) {
            self::MICRO => 'Micro',
            self::SMALL => 'Small',
            self::MEDIUM => 'Medium',
            self::LARGE => 'Large',
            self::ENTERPRISE => 'Enterprise',
        };
    }
}
