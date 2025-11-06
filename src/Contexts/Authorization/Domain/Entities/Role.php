<?php

namespace Src\Contexts\Authorization\Domain\Entities;

use Src\Contexts\Authorization\Domain\ValueObjects\RoleDescription;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleId;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleLevel;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleName;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleSlug;

final readonly class Role
{
    private function __construct(
        private RoleId $id,
        private RoleName $name,
        private RoleSlug $slug,
        private RoleLevel $level,
        private RoleDescription $description,
    ) {}

    public function id(): RoleId
    {
        return $this->id;
    }

    public function name(): RoleName
    {
        return $this->name;
    }

    public function slug(): RoleSlug
    {
        return $this->slug;
    }

    public function description(): RoleDescription
    {
        return $this->description;
    }

    public function level(): RoleLevel
    {
        return $this->level;
    }

    public static function create(
        RoleName $name,
        RoleSlug $slug,
        RoleLevel $level,
        RoleDescription $description,
    ): self {
        return new self(
            id: RoleId::generate(),
            name: $name,
            slug: $slug,
            level: $level,
            description: $description,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $name,
        string $slug,
        string $level,
        ?string $description,
    ): self {
        return new self(
            id: RoleId::fromString($id),
            name: RoleName::fromString($name),
            slug: RoleSlug::fromString($slug),
            level: RoleLevel::fromInt($level),
            description: RoleDescription::fromString($description),
        );
    }
}
