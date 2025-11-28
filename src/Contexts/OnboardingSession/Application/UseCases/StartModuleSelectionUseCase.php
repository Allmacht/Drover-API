<?php

namespace Src\Contexts\OnboardingSession\Application\UseCases;

use Src\Contexts\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\Contexts\Company\Domain\ValueObjects\CompanyId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyStatus;
use Src\Contexts\OnboardingSession\Application\Exceptions\OnboardingSessionApplicationException;
use Src\Contexts\OnboardingSession\Domain\Entities\OnboardingSession;

final class StartModuleSelectionUseCase
{
    public function __construct(
        private CompanyRepositoryContract $companyRepository
    ) {
    }

    public function __invoke(string $company_id, string $user_id)
    {
        $company = $this->companyRepository->findById(CompanyId::fromString($company_id));

        if ($company->owner_id()->value() !== $user_id) {
            throw OnboardingSessionApplicationException::userIsNotOwner();
        }

        if ($company->status()->value() !== CompanyStatus::PENDING_SETUP->value()) {
            throw OnboardingSessionApplicationException::companyIsNotPendingSetup();
        }

        $session = OnboardingSession::create();
    }
}