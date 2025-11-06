<?php

namespace Src\Contexts\User\Domain\Entities;

use Src\Contexts\User\Domain\ValueObjects\UserId;
use Src\Contexts\User\Domain\ValueObjects\UserNames;
use Src\Contexts\User\Domain\ValueObjects\UserPhone;
use Src\Contexts\User\Domain\ValueObjects\UserAvatar;
use Src\Contexts\User\Domain\ValueObjects\UserCountryId;
use Src\Contexts\User\Domain\ValueObjects\UserEmail;
use Src\Contexts\User\Domain\ValueObjects\UserPassword;
use Src\Contexts\User\Domain\ValueObjects\UserEmailVerifiedAt;
use Src\Contexts\User\Domain\ValueObjects\UserPhoneVerifiedAt;

final readonly class User
{
    private function __construct(
        private UserId $id,
        private UserNames $names,
        private UserPhone $phone,
        private UserAvatar $avatar,
        private UserCountryId $country_id,
        private UserPassword $password,
        private UserEmail $email,
        private UserEmailVerifiedAt $email_verified_at,
        private UserPhoneVerifiedAt $phone_verified_at,
    ) {}

    public function id(): UserId
    {
        return $this->id;
    }

    public function names(): UserNames
    {
        return $this->names;
    }

    public function phone(): UserPhone
    {
        return $this->phone;
    }

    public function avatar(): UserAvatar
    {
        return $this->avatar;
    }

    public function country_id(): UserCountryId
    {
        return $this->country_id;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function email_verified_at(): UserEmailVerifiedAt
    {
        return $this->email_verified_at;
    }

    public function phone_verified_at(): UserPhoneVerifiedAt
    {
        return $this->phone_verified_at;
    }

    public static function create(
        UserNames $names,
        UserPhone $phone,
        UserAvatar $avatar,
        UserCountryId $country_id,
        UserPassword $password,
        UserEmail $email,
        UserEmailVerifiedAt $email_verified_at,
        UserPhoneVerifiedAt $phone_verified_at,
    ): static {
        return new self(
            id: UserId::generate(),
            names: $names,
            phone: $phone,
            avatar: $avatar,
            country_id: $country_id,
            password: $password,
            email: $email,
            email_verified_at: $email_verified_at,
            phone_verified_at: $phone_verified_at,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $names,
        string $phone,
        ?string $avatar,
        ?string $country_id,
        string $password,
        string $email,
        ?string $email_verified_at,
        ?string $phone_verified_at,
    ): static {
        return new self(
            id: UserId::fromString($id),
            names: UserNames::fromString($names),
            phone: UserPhone::fromString($phone),
            avatar: UserAvatar::fromNullableString($avatar),
            country_id: UserCountryId::fromString($country_id),
            password: UserPassword::fromHashed($password),
            email: UserEmail::fromString($email),
            email_verified_at: UserEmailVerifiedAt::fromNullableString($email_verified_at),
            phone_verified_at: UserPhoneVerifiedAt::fromNullableString($phone_verified_at),
        );
    }
}