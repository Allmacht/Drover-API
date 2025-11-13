<?php

namespace Src\Contexts\User\Application\UseCases;

use Src\Contexts\Authorization\Domain\Contracts\RoleRepositoryContract;
use Src\Contexts\Authorization\Domain\ValueObjects\RoleSlug;
use Src\Contexts\User\Application\DTOs\UserDTO;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Domain\Entities\User;
use Src\Contexts\User\Domain\Exceptions\UserValidationException;
use Src\Contexts\User\Domain\ValueObjects\UserAvatar;
use Src\Contexts\User\Domain\ValueObjects\UserCountryId;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;
use Src\Contexts\User\Domain\ValueObjects\UserEmailVerifiedAt;
use Src\Contexts\User\Domain\ValueObjects\UserNames;
use Src\Contexts\User\Domain\ValueObjects\UserPassword;
use Src\Contexts\User\Domain\ValueObjects\UserPhone;
use Src\Contexts\User\Domain\ValueObjects\UserPhoneVerifiedAt;
use Src\Shared\Domain\Contracts\TransactionManagerInterface;

final class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryContract $userRepository,
        private RoleRepositoryContract $roleRepository,
        private TransactionManagerInterface $transactionManager,
    ) {}

    /**
     * Register a new user with the given credentials and assign them the specified role.
     *
     * @param  string  $names  The user's full name.
     * @param  string  $email  The user's email address.
     * @param  string  $password  The user's plain text password.
     * @param  string  $phone  The user's phone number.
     * @param  string  $country_id  The user's country ID.
     * @param  string  $role  The role to assign to the user (default: 'admin').
     * @return UserDTO The newly registered user.
     *
     * @throws UserValidationException If the email address is already in use.
     */
    public function __invoke(string $names, string $email, string $password, string $phone, string $country_id, string $role = 'admin'): UserDTO
    {
        $userEmail = UserEmail::fromString(value: $email);

        if ($this->userRepository->exists(email: $userEmail)) {
            throw UserValidationException::emailAlreadyExists();
        }

        $user = User::create(
            names: UserNames::fromString(value: $names),
            phone: UserPhone::fromString(value: $phone),
            country_id: UserCountryId::fromString(value: $country_id),
            email: $userEmail,
            password: UserPassword::fromPlainText(value: $password),
            avatar: UserAvatar::fromNullableString(value: null),
            email_verified_at: UserEmailVerifiedAt::fromNullableString(value: null),
            phone_verified_at: UserPhoneVerifiedAt::fromNullableString(value: null)
        );

        $user = $this->transactionManager->transaction(function () use ($user, $role) {

            $role = $this->roleRepository->findBySlug(slug: RoleSlug::fromString(value: $role));

            $new_user = $this->userRepository->persist(user: $user);

            $this->userRepository->assignRole(userId: $new_user->id()->value(), roleId: $role->id());

            if ($role->slug()->value() !== 'admin') {
                // todo: asign user to admin store.
            }

            return $new_user;
        });

        return UserDTO::fromEntity(user: $user);
    }
}
