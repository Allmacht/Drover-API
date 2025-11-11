<?php

namespace Src\Contexts\User\Infrastructure\Persistence\Mappers;

use Src\Contexts\User\Application\DTOs\UserDTO;

final class UserJsonApiMapper
{
    public static function toCollection(array $usersDTO, string $baseUrl)
    {
        return [
            'data' => array_map(
                fn (UserDTO $userDTO) => self::toResource(dto: $userDTO, baseUrl: $baseUrl),
                $usersDTO
            ),
        ];
    }

    public static function toResource(UserDTO $dto, string $baseUrl): array
    {
        return [
            'type' => 'users',
            'id' => $dto->id,
            'attributes' => [
                'names' => $dto->names,
                'email' => $dto->email,
                'phone' => $dto->phone,
                'country_id' => $dto->country_id,
            ],

            'links' => [
                'self' => $baseUrl.'/api/users/'.$dto->id,
            ],
        ];
    }
}
