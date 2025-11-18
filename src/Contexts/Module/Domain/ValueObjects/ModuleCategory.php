<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

enum ModuleCategory: string
{
    case CORE = 'core';
    case OPERATIONS = 'operations';
    case SALES = 'sales';
    case INTEGRATIONS = 'integrations';
    case ANALYTICS = 'analytics';
    case AUTOMATION = 'automation';

    public function label(): string
    {
        return match ($this) {
            self::CORE => 'Core',
            self::OPERATIONS => 'Operations',
            self::SALES => 'Sales',
            self::INTEGRATIONS => 'Integrations',
            self::ANALYTICS => 'Analytics',
            self::AUTOMATION => 'Automation',
        };
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return self::from($value);
    }
}
