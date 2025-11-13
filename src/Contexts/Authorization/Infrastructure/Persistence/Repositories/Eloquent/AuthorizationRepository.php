<?php

namespace Src\Contexts\Authorization\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User as EloquentUser;
use Src\Contexts\Authorization\Domain\Contracts\AuthorizationRepositoryContract;
use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\ValueObjects\UserId;

class AuthorizationRepository implements AuthorizationRepositoryContract
{
    public function generateToken(User $user, string $token_name): string
    {
        $user = EloquentUser::find($user->id()->value());

        return $user->createToken($token_name, $user->getPermissions(), now()->addDays(30))->plainTextToken;
    }

    public function revokeCurrent(UserId $user_id): void
    {
        EloquentUser::find($user_id->value())->currentAccessToken()->delete();
    }

    public function revokeAll(UserId $user_id): void
    {
        EloquentUser::find($user_id->value())->tokens()->delete();
    }
}
