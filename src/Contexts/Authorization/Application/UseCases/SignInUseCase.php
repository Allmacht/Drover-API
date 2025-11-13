<?php

namespace Src\Contexts\Authorization\Application\UseCases;

use Src\Contexts\Authorization\Domain\Contracts\AuthorizationRepositoryContract;
use Src\Contexts\Authorization\Domain\Exceptions\AuthorizationException;
use Src\Contexts\User\Domain\Contracts\UserRepositoryContract;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;

final class SignInUseCase
{
    public function __construct(
        private AuthorizationRepositoryContract $authorizationRepository,
        private UserRepositoryContract $userRepository
    ) {}

    public function __invoke(string $email, string $password)
    {
        $emailVO = UserEmail::fromString(value: $email);

        $user = $this->userRepository->findByEmail(email: $emailVO);

        if ($user === null || $user->password()->verify(plainPassword: $password) === false) {
            throw AuthorizationException::invalidCredentials();
        }

        $this->authorizationRepository->revokeAll(user_id: $user->id());

        // TODO: change the token name to be more specific
        $token = $this->authorizationRepository->generateToken(user: $user, token_name: 'drover API token');

        // TODO: send email to inform user that a new session has been created

        return $token;
    }
}
