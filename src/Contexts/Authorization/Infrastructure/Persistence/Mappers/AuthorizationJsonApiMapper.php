<?php

namespace Src\Contexts\Authorization\Infrastructure\Persistence\Mappers;

final class AuthorizationJsonApiMapper
{
    public static function toResource(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => now()->addDays(30)->timestamp,
        ];
    }
}
