<?php

namespace Src\Contexts\Authorization\Domain\Contracts;

use Src\Contexts\Authorization\Domain\Entities\Role;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleSlug;

interface RoleRepositoryContract
{
    public function findBySlug(RoleSlug $slug): ?Role;
}
