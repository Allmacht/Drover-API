<?php

namespace Src\Contexts\User\Infrastructure\Persistence\Mappers;

use Src\Contexts\User\Application\DTOs\CompleteUserDTO;

final class CompleteUserJsonApiMapper
{
    public static function toJsonApi(CompleteUserDTO $user, string $baseUrl): array
    {
        $response = [
            'data' => [
                'type' => 'users',
                'id' => $user->id,
                'attributes' => [
                    'names' => $user->names,
                    'phone' => $user->phone,
                    'avatar' => $user->avatar,
                    'email' => $user->email,
                    'email_verified_at' => $user->email_verified_at,
                    'phone_verified_at' => $user->phone_verified_at,
                ],

                'relationships' => [],
            ],
            'included' => [],
        ];

        if ($user->country) {
            $response['data']['relationships']['country'] = [
                'data' => [
                    'type' => 'countries',
                    'id' => $user->country->id,
                ],
                'links' => [
                    'related' => $baseUrl.'/api/countries/'.$user->country->id,
                ],
            ];

            $response['included'][] = [
                'type' => 'countries',
                'id' => $user->country->id,
                'attributes' => [
                    'name' => $user->country->name,
                    'code' => $user->country->code,
                    'flag' => $user->country->flag,
                    'currency' => $user->country->currency,
                    'currency_symbol' => $user->country->currency_symbol,
                    'phone_code' => $user->country->phone_code,
                    'phone_pattern' => $user->country->phone_pattern,
                    'timezone' => $user->country->timezone,
                    'locale' => $user->country->locale,
                ],
            ];
        }

        if (! empty($user->roles)) {
            $response['data']['relationships']['roles'] = [
                'data' => array_map(fn ($role) => [
                    'type' => 'roles',
                    'id' => $role->id,
                ],
                    $user->roles
                ),

                'links' => [
                    'related' => $baseUrl.'/api/users/'.$user->id.'/roles',
                ],
            ];

            foreach ($user->roles as $role) {
                $response['included'][] = [
                    'type' => 'roles',
                    'id' => $role->id,
                    'attributes' => [
                        'name' => $role->name,
                        'slug' => $role->slug,
                        'level' => $role->level,
                        'description' => $role->description,
                        'permissions' => $role->permissions,
                    ],
                ];
            }
        }

        $response['links'] = [
            'self' => $baseUrl.'/api/users/me',
        ];

        return $response;
    }
}
