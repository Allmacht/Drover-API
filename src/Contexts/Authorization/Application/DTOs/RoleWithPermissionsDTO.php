<?php

namespace Src\Contexts\Authorization\Application\DTOs;

class RoleWithPermissionsDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $slug,
        public string $level,
        public ?string $description,
        public array $permissions
    ) {}

    public static function fromPrimitives(
        string $id,
        string $name,
        string $slug,
        string $level,
        ?string $description,
        array $permissions
    ): self {
        return new self(
            id: $id,
            name: $name,
            slug: $slug,
            level: $level,
            description: $description,
            permissions: array_map(fn ($permission): array =>
                ["permission" => $permission["slug"],
                "description" => $permission["description"]
            ], $permissions),
        );
    }
}