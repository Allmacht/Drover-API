<?php

namespace Src\Contexts\User\Application\UseCases;

use Src\Contexts\User\Application\DTOs\CompleteUserDTO;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Domain\ValueObjects\UserId;

final class GetCurrentUserUseCase
{
    public function __construct(
        private UserRepositoryContract $userRepository
    ) {}

    public function __invoke(string $user_id)
    {
        $user = $this->userRepository->findCompleteById(userId: UserId::fromString(value: $user_id));

        return CompleteUserDTO::fromPrimitives(
            id: $user['id'],
            names: $user['names'],
            phone: $user['phone'],
            avatar: $user['avatar'],
            email: $user['email'],
            email_verified_at: $user['email_verified_at'],
            phone_verified_at: $user['phone_verified_at'],
            countryData: $user['country'],
            rolesData: $user['roles']
        );
    }
}
