<?php

namespace Src\Contexts\Company\Application\DTOs;

use Src\Contexts\Company\Domain\Entities\Company;

final class CompanyDTO
{
    private function __construct(
        public string $id,
        public string $name,
        public string $owner_id,
        public string $legal_name,
        public ?string $tax_id,
        public ?string $tax_id_type,
        public ?string $tax_regime,
        public ?string $business_type,
        public ?string $registration_number,
        public ?string $website,
        public ?string $billing_email,
        public ?string $billing_phone,
        public ?string $size,
        public ?string $status,
        public ?string $logo_url,
        public ?string $primary_color,
        public ?string $secondary_color,
        public array $settings,
        public array $metadata,
        public ?string $created_at,
        public ?string $updated_at,
        public ?string $created_by_id,
        public ?string $updated_by_id,
    ) {}

    public static function fromEntity(Company $company): self
    {
        return new self(
            id: $company->id()->value(),
            name: $company->name()->value(),
            owner_id: $company->owner_id()->value(),
            legal_name: $company->legal_name()->value(),
            tax_id: $company->tax_id()->value(),
            tax_id_type: $company->tax_id_type()->value(),
            tax_regime: $company->tax_regime()->value(),
            business_type: $company->business_type()->value(),
            registration_number: $company->registration_number()->value(),
            website: $company->website()->value(),
            billing_email: $company->billing_email()->value(),
            billing_phone: $company->billing_phone()->value(),
            size: $company->size()->value(),
            status: $company->status()->value(),
            logo_url: $company->logo_url()->value(),
            primary_color: $company->primary_color()->value(),
            secondary_color: $company->secondary_color()->value(),
            settings: $company->settings()->value(),
            metadata: $company->metadata()->value(),
            created_at: $company->created_at()->value(),
            updated_at: $company->updated_at()->value(),
            created_by_id: $company->created_by_id()->value(),
            updated_by_id: $company->updated_by_id()->value(),
        );
    }
}
