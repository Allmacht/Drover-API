<?php

namespace Src\Contexts\Company\Application\UseCases;

use Src\Contexts\Company\Application\DTOs\CompanyDTO;
use Src\Contexts\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\Contexts\Company\Domain\Entities\Company;
use Src\Contexts\Company\Domain\Exceptions\CompanyValidationException;
use Src\Contexts\Company\Domain\ValueObjects\CompanyBillingEmail;
use Src\Contexts\Company\Domain\ValueObjects\CompanyBillingPhone;
use Src\Contexts\Company\Domain\ValueObjects\CompanyBusinessType;
use Src\Contexts\Company\Domain\ValueObjects\CompanyCreatedAt;
use Src\Contexts\Company\Domain\ValueObjects\CompanyCreatedById;
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
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxIdType;
use Src\Contexts\Company\Domain\ValueObjects\CompanyTaxRegime;
use Src\Contexts\Company\Domain\ValueObjects\CompanyUpdatedAt;
use Src\Contexts\Company\Domain\ValueObjects\CompanyUpdatedById;
use Src\Contexts\Company\Domain\ValueObjects\CompanyWebsite;
use Src\Shared\Domain\Contracts\TransactionManagerInterface;

final class CreateCompanyUseCase
{
    public function __construct(
        private TransactionManagerInterface $transactionManager,
        private CompanyRepositoryContract $repository
    ) {}

    public function __invoke(string $name, string $owner_id): CompanyDTO
    {
        $company = $this->repository->findByNameAndOwnerId(
            name: CompanyName::fromString($name),
            owner_id: CompanyOwnerId::fromString($owner_id)
        );

        if (! is_null($company)) {
            throw CompanyValidationException::companyAlreadyExists();
        }

        $company = Company::create(
            name: CompanyName::fromString($name),
            owner_id: CompanyOwnerId::fromString($owner_id),
            legal_name: CompanyLegalName::fromString($name),
            tax_id: CompanyTaxId::fromString(null),
            tax_id_type: CompanyTaxIdType::fromString('RFC'),
            tax_regime: CompanyTaxRegime::fromString(null),
            business_type: CompanyBusinessType::fromString('individual'),
            registration_number: CompanyRegistrationNumber::fromString(null),
            website: CompanyWebsite::fromString(null),
            billing_email: CompanyBillingEmail::fromString(null),
            billing_phone: CompanyBillingPhone::fromString(null),
            size: CompanySize::fromString('1-10'),
            logo_url: CompanyLogoUrl::fromString(null),
            primary_color: CompanyPrimaryColor::fromString(null),
            secondary_color: CompanySecondaryColor::fromString(null),
            settings: CompanySettings::fromArray([]),
            metadata: CompanyMetadata::fromArray([]),
            created_at: CompanyCreatedAt::fromString(null),
            updated_at: CompanyUpdatedAt::fromString(null),
            created_by_id: CompanyCreatedById::fromString($owner_id),
            updated_by_id: CompanyUpdatedById::fromString($owner_id),
        );

        $company = $this->transactionManager->transaction(function () use ($company): Company {
            return $this->repository->persist(company: $company);
        });

        return CompanyDTO::fromEntity($company);
    }
}
