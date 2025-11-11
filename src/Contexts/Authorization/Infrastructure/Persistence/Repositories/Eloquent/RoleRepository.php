<?php

namespace Src\Contexts\Authorization\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\Role as EloquentRole;
use Src\Contexts\Authorization\Domain\Contracts\RoleRepositoryContract;
use Src\Contexts\Authorization\Domain\Entities\Role;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleSlug;

class RoleRepository implements RoleRepositoryContract
{
    public function findBySlug(RoleSlug $slug): ?Role
    {
        $model = EloquentRole::where('slug', $slug->value())->first();

        return $model ? $this->mapToDomainEntity($model) : null;
    }

    private function mapToDomainEntity(EloquentRole $eloquentRole): Role
    {
        return Role::fromPrimitives(
            id: $eloquentRole->id,
            name: $eloquentRole->name,
            slug: $eloquentRole->slug,
            level: $eloquentRole->level,
            description: $eloquentRole->description,
        );
    }
}
