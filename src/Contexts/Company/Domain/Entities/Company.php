<?php

namespace Src\Contexts\Company\Domain\Entities;

use Src\Contexts\Company\Domain\ValueObjects\CompanyBillingEmail;
use Src\Contexts\Company\Domain\ValueObjects\CompanyBillingPhone;
use Src\Contexts\Company\Domain\ValueObjects\CompanyBusinessType;
use Src\Contexts\Company\Domain\ValueObjects\CompanyCreatedAt;
use Src\Contexts\Company\Domain\ValueObjects\CompanyCreatedById;
use Src\Contexts\Company\Domain\ValueObjects\CompanyId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyLegalName;
use Src\Contexts\Company\Domain\ValueObjects\CompanyLogoUrl;
use Src\Contexts\Company\Domain\ValueObjects\CompanyMetadata;
use Src\Contexts\Company\Domain\ValueObjects\CompanyName;
use Src\Contexts\Company\Domain\ValueObjects\CompanyOwnerId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyPrimaryColor;
use Src\Contexts\Company\Domain\ValueObjects\CompanyRegistrationNumber;
use Src\Contexts\Company\Domain\ValueObjects\CompanySecondaryColor;
use Src\Contexts\Company\Domain\ValueObjects\CompanySettings;
use Src\Contexts\Company\Domain\ValueObjects\CompanySize;
use Src\Contexts\Company\Domain\ValueObjects\CompanySlug;
use Src\Contexts\Company\Domain\ValueObjects\CompanyStatus;
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxIdType;
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxRegime;
use Src\Contexts\Company\Domain\ValueObjects\CompanyUpdatedAt;
use Src\Contexts\Company\Domain\ValueObjects\CompanyUpdatedById;
use Src\Contexts\Company\Domain\ValueObjects\CompanyWebsite;

final class Company
{
    private function __construct(
        private CompanyId $id,
        private CompanyOwnerId $owner_id,
        private CompanyName $name,
        private CompanyLegalName $legal_name,
        private CompanySlug $slug,
        private CompanyTaxId $tax_id,
        private CompanyTaxIdType $tax_id_type,
        private CompanyTaxRegime $tax_regime,
        private CompanyBusinessType $business_type,
        private CompanyRegistrationNumber $registration_number,
        private CompanyWebsite $website,
        private CompanyBillingEmail $billing_email,
        private CompanyBillingPhone $billing_phone,
        private CompanySize $size,
        private CompanyStatus $status,
        private CompanyLogoUrl $logo_url,
        private CompanyPrimaryColor $primary_color,
        private CompanySecondaryColor $secondary_color,
        private CompanySettings $settings,
        private CompanyMetadata $metadata,
        private CompanyCreatedAt $created_at,
        private CompanyUpdatedAt $updated_at,
        private CompanyCreatedById $created_by_id,
        private CompanyUpdatedById $updated_by_id
    ) {
    }

    public function id(): CompanyId
    {
        return $this->id;
    }

    public function owner_id(): CompanyOwnerId
    {
        return $this->owner_id;
    }

    public function name(): CompanyName
    {
        return $this->name;
    }

    public function legal_name(): CompanyLegalName
    {
        return $this->legal_name;
    }

    public function slug(): CompanySlug
    {
        return $this->slug;
    }

    public function tax_id(): CompanyTaxId
    {
        return $this->tax_id;
    }

    public function tax_id_type(): CompanyTaxIdType
    {
        return $this->tax_id_type;
    }

    public function tax_regime(): CompanyTaxRegime
    {
        return $this->tax_regime;
    }

    public function business_type(): CompanyBusinessType
    {
        return $this->business_type;
    }

    public function registration_number(): CompanyRegistrationNumber
    {
        return $this->registration_number;
    }

    public function website(): CompanyWebsite
    {
        return $this->website;
    }

    public function billing_email(): CompanyBillingEmail
    {
        return $this->billing_email;
    }

    public function billing_phone(): CompanyBillingPhone
    {
        return $this->billing_phone;
    }

    public function size(): CompanySize
    {
        return $this->size;
    }

    public function status(): CompanyStatus
    {
        return $this->status;
    }

    public function logo_url(): CompanyLogoUrl
    {
        return $this->logo_url;
    }

    public function primary_color(): CompanyPrimaryColor
    {
        return $this->primary_color;
    }

    public function secondary_color(): CompanySecondaryColor
    {
        return $this->secondary_color;
    }

    public function settings(): CompanySettings
    {
        return $this->settings;
    }

    public function metadata(): CompanyMetadata
    {
        return $this->metadata;
    }

    public function created_at(): CompanyCreatedAt
    {
        return $this->created_at;
    }

    public function updated_at(): CompanyUpdatedAt
    {
        return $this->updated_at;
    }

    public function created_by_id(): CompanyCreatedById
    {
        return $this->created_by_id;
    }

    public function updated_by_id(): CompanyUpdatedById
    {
        return $this->updated_by_id;
    }

    public static function create(
        CompanyOwnerId $owner_id,
        CompanyName $name,
        CompanyLegalName $legal_name,
        CompanyTaxId $tax_id,
        CompanyTaxIdType $tax_id_type,
        CompanyTaxRegime $tax_regime,
        CompanyBusinessType $business_type,
        CompanyRegistrationNumber $registration_number,
        CompanyWebsite $website,
        CompanyBillingEmail $billing_email,
        CompanyBillingPhone $billing_phone,
        CompanySize $size,
        CompanyLogoUrl $logo_url,
        CompanyPrimaryColor $primary_color,
        CompanySecondaryColor $secondary_color,
        CompanySettings $settings,
        CompanyMetadata $metadata,
        CompanyCreatedAt $created_at,
        CompanyUpdatedAt $updated_at,
        CompanyCreatedById $created_by_id,
        CompanyUpdatedById $updated_by_id
    ): self {
        return new self(
            id: CompanyId::generate(),
            owner_id: $owner_id,
            name: $name,
            legal_name: $legal_name,
            slug: CompanySlug::fromString($name->value()),
            tax_id: $tax_id,
            tax_id_type: $tax_id_type,
            tax_regime: $tax_regime,
            business_type: $business_type,
            registration_number: $registration_number,
            website: $website,
            billing_email: $billing_email,
            billing_phone: $billing_phone,
            size: $size,
            status: CompanyStatus::PENDING_SETUP,
            logo_url: $logo_url,
            primary_color: $primary_color,
            secondary_color: $secondary_color,
            settings: $settings,
            metadata: $metadata,
            created_at: $created_at,
            updated_at: $updated_at,
            created_by_id: $created_by_id,
            updated_by_id: $updated_by_id
        );
    }

    public static function fromPrimitives(
        string $id,
        string $owner_id,
        string $name,
        string $legal_name,
        string $slug,
        ?string $tax_id,
        ?string $tax_id_type,
        ?string $tax_regime,
        ?string $business_type,
        ?string $registration_number,
        ?string $website,
        ?string $billing_email,
        ?string $billing_phone,
        ?string $size,
        ?string $status,
        ?string $logo_url,
        ?string $primary_color,
        ?string $secondary_color,
        ?array $settings,
        ?array $metadata,
        ?string $created_at,
        ?string $updated_at,
        ?string $created_by_id,
        ?string $updated_by_id
    ): self {
        return new self(
            id: CompanyId::fromString($id),
            owner_id: CompanyOwnerId::fromString($owner_id),
            name: CompanyName::fromString($name),
            legal_name: CompanyLegalName::fromString($legal_name),
            slug: CompanySlug::fromString($slug),
            tax_id: CompanyTaxId::fromString($tax_id),
            tax_id_type: CompanyTaxIdType::fromString($tax_id_type),
            tax_regime: CompanyTaxRegime::fromString($tax_regime),
            business_type: CompanyBusinessType::fromString($business_type),
            registration_number: CompanyRegistrationNumber::fromString($registration_number),
            website: CompanyWebsite::fromString($website),
            billing_email: CompanyBillingEmail::fromString($billing_email),
            billing_phone: CompanyBillingPhone::fromString($billing_phone),
            size: CompanySize::fromString($size),
            status: CompanyStatus::fromString($status),
            logo_url: CompanyLogoUrl::fromString($logo_url),
            primary_color: CompanyPrimaryColor::fromString($primary_color),
            secondary_color: CompanySecondaryColor::fromString($secondary_color),
            settings: CompanySettings::fromArray($settings),
            metadata: CompanyMetadata::fromArray($metadata),
            created_at: CompanyCreatedAt::fromString($created_at),
            updated_at: CompanyUpdatedAt::fromString($updated_at),
            created_by_id: CompanyCreatedById::fromString($created_by_id),
            updated_by_id: CompanyUpdatedById::fromString($updated_by_id)
        );
    }
}
