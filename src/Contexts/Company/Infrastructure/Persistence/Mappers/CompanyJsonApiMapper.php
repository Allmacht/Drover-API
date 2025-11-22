<?php

namespace Src\Contexts\Company\Infrastructure\Persistence\Mappers;

use Src\Contexts\Company\Application\DTOs\CompanyDTO;

final class CompanyJsonApiMapper
{
    public static function toCollection(array $companiesDTO, string $baseUrl)
    {
        return [
            'data' => array_map(fn(CompanyDTO $dto) => self::toResource($dto, $baseUrl), $companiesDTO),
        ];
    }

    public static function toResource(CompanyDTO $dto, string $baseUrl)
    {
        return [
            'id' => $dto->id,
            'type' => 'companies',
            'attributes' => [
                'name' => $dto->name,
                'owner_id' => $dto->owner_id,
                'legal_name' => $dto->legal_name,
                'tax_id' => $dto->tax_id,
                'tax_id_type' => $dto->tax_id_type,
                'tax_regime' => $dto->tax_regime,
                'business_type' => $dto->business_type,
                'registration_number' => $dto->registration_number,
                'website' => $dto->website,
                'billing_email' => $dto->billing_email,
                'billing_phone' => $dto->billing_phone,
                'size' => $dto->size,
                'status' => $dto->status,
                'logo_url' => $dto->logo_url,
                'primary_color' => $dto->primary_color,
                'secondary_color' => $dto->secondary_color,
                'settings' => $dto->settings,
                'metadata' => $dto->metadata,
                'created_at' => $dto->created_at,
                'updated_at' => $dto->updated_at,
                'created_by_id' => $dto->created_by_id,
                'updated_by_id' => $dto->updated_by_id,
            ],
            'links' => [
                'self' => $baseUrl . '/companies/' . $dto->id,
            ],
        ];
    }
}