<?php

namespace Src\Contexts\User\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User as EloquentUser;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleId;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;

class UserRepository implements UserRepositoryContract
{
    public function exists(UserEmail $email): bool
    {
        return EloquentUser::where('email', $email->value())->exists();
    }

    public function persist(User $user): User
    {
        $eloquentUser = new EloquentUser;

        $eloquentUser->id = $user->id()->value();
        $eloquentUser->names = $user->names()->value();
        $eloquentUser->phone = $user->phone()->value();
        $eloquentUser->avatar = $user->avatar()->value();
        $eloquentUser->country_id = $user->country_id()->value();
        $eloquentUser->password = $user->password()->value();
        $eloquentUser->email = $user->email()->value();
        $eloquentUser->email_verified_at = $user->email_verified_at()->value();
        $eloquentUser->phone_verified_at = $user->phone_verified_at()->value();

        $eloquentUser->save();

        return $this->mapToDomainEntity(eloquentUser: $eloquentUser);
    }

    public function assignRole(string $userId, RoleId $roleId): void
    {
        $user = EloquentUser::find($userId);

        $user->roles()->syncWithoutDetaching([$roleId->value()]);
    }

    private function mapToDomainEntity(EloquentUser $eloquentUser): User
    {
        return User::fromPrimitives(
            id: $eloquentUser->id,
            names: $eloquentUser->names,
            phone: $eloquentUser->phone,
            avatar: $eloquentUser->avatar,
            country_id: $eloquentUser->country_id,
            password: $eloquentUser->password,
            email: $eloquentUser->email,
            email_verified_at: $eloquentUser->email_verified_at,
            phone_verified_at: $eloquentUser->phone_verified_at,
        );
    }
}
