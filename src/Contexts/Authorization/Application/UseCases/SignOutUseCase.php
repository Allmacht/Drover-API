<?php

namespace Src\Contexts\Authorization\Application\UseCases;

use Src\Contexts\Authorization\Domain\Contracts\AuthorizationRepositoryContract;
use Src\Contexts\User\Domain\ValueObjects\UserId;

final class SignOutUseCase
{
    public function __construct(
        private AuthorizationRepositoryContract $authorizationRepository
    ) {}

    public function __invoke(string $user_id): void
    {
        $this->authorizationRepository->revokeAll(user_id: UserId::fromString(value: $user_id));
    }
}