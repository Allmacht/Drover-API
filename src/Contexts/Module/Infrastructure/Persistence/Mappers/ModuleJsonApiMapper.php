<?php

namespace Src\Contexts\Module\Infrastructure\Persistence\Mappers;

use Src\Contexts\Module\Application\DTOs\ModuleDTO;

final class ModuleJsonApiMapper
{
    public static function toCollection(array $modulesDTO, string $baseUrl): array
    {
        return [
            'data' => array_map(fn (ModuleDTO $dto) => self::toResource($dto, $baseUrl), $modulesDTO),
        ];
    }

    public static function toResource(ModuleDTO $dto, string $baseUrl): array
    {
        return [
            'id' => $dto->id,
            'type' => 'modules',
            'attributes' => [
                'name' => $dto->name,
                'description' => $dto->description,
                'icon' => $dto->icon,
                'color' => $dto->color,
                'banner_url' => $dto->banner_url,
                'features' => $dto->features,
                'metadata' => $dto->metadata,
                'is_required' => $dto->is_required,
                'is_active' => $dto->is_active,
                'is_beta' => $dto->is_beta,
                'sort_order' => $dto->sort_order,
                'requires_modules' => $dto->requires_modules,
                'conflicts_with' => $dto->conflicts_with,
            ],
            'links' => [
                'self' => $baseUrl.'/modules/'.$dto->id,
            ],
        ];
    }
}
