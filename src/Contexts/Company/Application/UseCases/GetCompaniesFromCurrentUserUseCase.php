<?php

namespace Src\Contexts\Company\Application\UseCases;

use Src\Contexts\Company\Application\DTOs\CompanyListDTO;
use Src\Contexts\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\Contexts\User\Domain\ValueObjects\UserId;

class GetCompaniesFromCurrentUserUseCase
{
    public function __construct(
        private readonly CompanyRepositoryContract $company_repository
    ) {}

    public function __invoke(string $user_id): CompanyListDTO
    {

        $companies = $this->company_repository->findAllByUser(user_id: UserId::fromString($user_id));

        $owned = array_filter($companies, fn ($c): bool => $c['relationship'] === 'owner');
        $memberships = array_filter($companies, fn ($c): bool => $c['relationship'] === 'member');

        return new CompanyListDTO(
            owned: $owned,
            memberships: $memberships,
            totalCount: count($companies)
        );
    }
}
