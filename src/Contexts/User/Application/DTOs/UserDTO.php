<?php

namespace Src\Contexts\User\Application\DTOs;

use Src\Contexts\User\Domain\Entities\User;

final readonly class UserDTO
{
    private function __construct(
        public string $id,
        public string $names,
        public string $phone,
        public ?string $avatar,
        public string $country_id,
        public string $password,
        public string $email,
        public ?string $email_verified_at,
        public ?string $phone_verified_at,
    ) {}

    public static function fromEntity(User $user): self
    {
        return new self(
            id: $user->id()->value(),
            names: $user->names()->value(),
            phone: $user->phone()->value(),
            avatar: $user->avatar()->value(),
            country_id: $user->country_id()->value(),
            password: $user->password()->value(),
            email: $user->email()->value(),
            email_verified_at: $user->email_verified_at()->value(),
            phone_verified_at: $user->phone_verified_at()->value(),
        );
    }
}
