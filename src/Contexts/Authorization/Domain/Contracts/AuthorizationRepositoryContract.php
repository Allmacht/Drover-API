<?php

namespace Src\Contexts\Authorization\Domain\Contracts;

use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\ValueObjects\UserId;

interface AuthorizationRepositoryContract
{
    public function generateToken(User $user, string $token_name): string;

    public function revokeCurrent(UserId $user_id): void;

    public function revokeAll(UserId $user_id): void;
}
