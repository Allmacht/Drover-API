<?php

namespace Src\Contexts\User\Domain\Contracts;

use Src\Contexts\Authorization\Domain\ValueObjects\RoleId;
use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;
use Src\Contexts\User\Domain\ValueObjects\UserId;

interface UserRepositoryContract
{
    public function exists(UserEmail $email): bool;

    public function persist(User $user): User;

    public function findByEmail(UserEmail $email): ?User;

    public function findCompleteById(UserId $userId): ?array;

    public function assignRole(string $userId, RoleId $roleId): void;
}
