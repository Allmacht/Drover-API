<?php

namespace Src\Contexts\User\Application\DTOs;

use Src\Contexts\Authorization\Application\DTOs\RoleWithPermissionsDTO;
use Src\Contexts\Country\Application\DTOs\CountryDTO;

final readonly class CompleteUserDTO
{
    private function __construct(
        public string $id,
        public string $names,
        public string $phone,
        public ?string $avatar,
        public string $email,
        public ?string $email_verified_at,
        public ?string $phone_verified_at,
        public CountryDTO $country,
        public array $roles
    ) {}

    public static function fromPrimitives(
        string $id,
        string $names,
        string $phone,
        ?string $avatar,
        string $email,
        ?string $email_verified_at,
        ?string $phone_verified_at,
        ?array $countryData,
        array $rolesData
    ): self
    {
        return new self(
            id: $id,
            names: $names,
            phone: $phone,
            avatar: $avatar,
            email: $email,
            email_verified_at: $email_verified_at,
            phone_verified_at: $phone_verified_at,
            country: CountryDTO::fromPrimitives(
                id: $countryData['id'],
                name: $countryData['name'],
                code: $countryData['code'],
                currency: $countryData['currency'],
                currency_symbol: $countryData['currency_symbol'],
                phone_code: $countryData['phone_code'],
                phone_pattern: $countryData['phone_pattern'],
                flag: $countryData['flag']),
            roles: array_map (fn($role) => RoleWithPermissionsDTO::fromPrimitives(
                id: $role['id'],
                name: $role['name'],
                slug: $role['slug'],
                level: $role['level'],
                description: $role['description'],
                permissions: $role['permissions']
            ), $rolesData)
        );
    }
}