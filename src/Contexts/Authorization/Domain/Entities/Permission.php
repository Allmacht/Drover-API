<?php

namespace Src\Contexts\Authorization\Domain\Entities;

use Src\Contexts\Authorization\Domain\ValueObjects\PermissionDescription;
use Src\Contexts\Authorization\Domain\ValueObjects\PermissionGroup;
use Src\Contexts\Authorization\Domain\ValueObjects\PermissionId;
use Src\Contexts\Authorization\Domain\ValueObjects\PermissionName;
use Src\Contexts\Authorization\Domain\ValueObjects\PermissionSlug;

final readonly class Permission
{
    private function __construct(
        private PermissionId $id,
        private PermissionName $name,
        private PermissionSlug $slug,
        private PermissionDescription $description,
        private PermissionGroup $group,
    ) {}

    public function id(): PermissionId
    {
        return $this->id;
    }

    public function name(): PermissionName
    {
        return $this->name;
    }

    public function slug(): PermissionSlug
    {
        return $this->slug;
    }

    public function description(): PermissionDescription
    {
        return $this->description;
    }

    public function group(): PermissionGroup
    {
        return $this->group;
    }

    public static function create(
        PermissionName $name,
        PermissionSlug $slug,
        PermissionDescription $description,
        PermissionGroup $group,
    ): self {
        return new self(
            id: PermissionId::generate(),
            name: $name,
            slug: PermissionSlug::fromString($slug->value()),
            description: $description,
            group: $group
        );
    }

    public static function fromPrimitives(
        string $id,
        string $name,
        string $slug,
        ?string $description,
        ?string $group,
    ): self {
        return new self(
            id: PermissionId::fromString($id),
            name: PermissionName::fromString($name),
            slug: PermissionSlug::fromString($slug),
            description: PermissionDescription::fromString($description),
            group: PermissionGroup::fromString($group),
        );
    }
}
