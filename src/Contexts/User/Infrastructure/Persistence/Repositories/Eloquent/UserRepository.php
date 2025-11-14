<?php

namespace Src\Contexts\User\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User as EloquentUser;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleId;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;
use Src\Contexts\User\Domain\ValueObjects\UserId;

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

    public function findByEmail(UserEmail $email): ?User
    {
        $eloquentUser = EloquentUser::where('email', $email->value())->sole();

        return $eloquentUser ? $this->mapToDomainEntity(eloquentUser: $eloquentUser) : null;
    }

    public function findCompleteById(UserId $userId): ?array
    {
        $eloquentUser = EloquentUser::with(['roles.permissions', 'country'])->find($userId->value());

        return [
            'id' => $eloquentUser->id,
            'names' => $eloquentUser->names,
            'phone' => $eloquentUser->phone,
            'avatar' => $eloquentUser->avatar,
            'country_id' => $eloquentUser->country_id,
            'email' => $eloquentUser->email,
            'email_verified_at' => $eloquentUser->email_verified_at,
            'phone_verified_at' => $eloquentUser->phone_verified_at,
            'country' => $eloquentUser->country ? [
                'id' => $eloquentUser->country->id,
                'name' => $eloquentUser->country->name,
                'code' => $eloquentUser->country->code,
                'currency' => $eloquentUser->country->currency,
                'currency_symbol' => $eloquentUser->country->currency_symbol,
                'phone_code' => $eloquentUser->country->phone_code,
                'phone_pattern' => $eloquentUser->country->phone_pattern,
                'timezone' => $eloquentUser->country->timezone,
                'locale' => $eloquentUser->country->locale,
                'flag' => $eloquentUser->country->flag,
            ] : null,
            'roles' => $eloquentUser->roles->map(function ($role) {
                return [
                    'id' => $role->id,
                    'name' => $role->name,
                    'slug' => $role->slug,
                    'level' => $role->level,
                    'description' => $role->description,
                    'permissions' => $role->permissions->map(function ($permission) {
                        return [
                            'slug' => $permission->slug,
                            'description' => $permission->description,
                        ];
                    })->toArray(),
                ];
            })->toArray(),
        ];
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
