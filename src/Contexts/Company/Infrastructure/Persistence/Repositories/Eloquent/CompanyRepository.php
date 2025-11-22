<?php

namespace Src\Contexts\Company\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\Company as EloquentModel;
use Src\Contexts\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\Contexts\Company\Domain\Entities\Company;
use Src\Contexts\Company\Domain\ValueObjects\CompanyName;
use Src\Contexts\Company\Domain\ValueObjects\CompanyOwnerId;

class CompanyRepository implements CompanyRepositoryContract
{
    public function findByNameAndOwnerId(CompanyName $name, CompanyOwnerId $owner_id): ?Company
    {
        $model = EloquentModel::where('name', $name->value())->where('owner_id', $owner_id->value())->first();

        if ($model) {
            return $this->mapToDomainEntity(company: $model);
        }

        return null;
    }

    public function persist(Company $company): Company
    {
        $model = EloquentModel::create(
            [
                'id' => $company->id()->value(),
                'owner_id' => $company->owner_id()->value(),
                'name' => $company->name()->value(),
                'legal_name' => $company->legal_name()->value(),
                'slug' => $company->slug()->value(),
                'tax_id' => $company->tax_id()->value(),
                'tax_id_type' => $company->tax_id_type()->value(),
                'tax_regime' => $company->tax_regime()->value(),
                'business_type' => $company->business_type()->value(),
                'registration_number' => $company->registration_number()->value(),
                'website' => $company->website()->value(),
                'billing_email' => $company->billing_email()->value(),
                'billing_phone' => $company->billing_phone()->value(),
                'company_size' => $company->size()->value(),
                'status' => $company->status()->value(),
                'logo_url' => $company->logo_url()->value(),
                'primary_color' => $company->primary_color()->value(),
                'secondary_color' => $company->secondary_color()->value(),
                'settings' => $company->settings()->value(),
                'metadata' => $company->metadata()->value(),
                'created_by_id' => $company->created_by_id()->value(),
                'updated_by_id' => $company->updated_by_id()->value(),
            ]
        );

        return $this->mapToDomainEntity(company: $model);
    }

    private function mapToDomainEntity(EloquentModel $company): Company
    {
        return Company::fromPrimitives(
            id: $company->id,
            owner_id: $company->owner_id,
            name: $company->name,
            legal_name: $company->legal_name,
            slug: $company->slug,
            tax_id: $company->tax_id,
            tax_id_type: $company->tax_id_type,
            tax_regime: $company->tax_regime,
            business_type: $company->business_type,
            registration_number: $company->registration_number,
            website: $company->website,
            billing_email: $company->billing_email,
            billing_phone: $company->billing_phone,
            size: $company->company_size,
            status: $company->status,
            logo_url: $company->logo_url,
            primary_color: $company->primary_color,
            secondary_color: $company->secondary_color,
            settings: $company->settings,
            metadata: $company->metadata,
            created_at: $company->created_at,
            updated_at: $company->updated_at,
            created_by_id: $company->created_by_id,
            updated_by_id: $company->updated_by_id
        );
    }

}
