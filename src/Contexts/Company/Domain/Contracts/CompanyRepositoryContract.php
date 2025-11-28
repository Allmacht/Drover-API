<?php

namespace Src\Contexts\Company\Domain\Contracts;

use Src\Contexts\Company\Domain\Entities\Company;
use Src\Contexts\Company\Domain\ValueObjects\CompanyId;
use Src\Contexts\Company\Domain\ValueObjects\CompanyName;
use Src\Contexts\Company\Domain\ValueObjects\CompanyOwnerId;
use Src\Contexts\User\Domain\ValueObjects\UserId;

interface CompanyRepositoryContract
{
    public function findById(CompanyId $companyId): ?Company;

    public function findByNameAndOwnerId(CompanyName $name, CompanyOwnerId $owner_id): ?Company;

    public function persist(Company $company): Company;

    public function findAllByUser(UserId $user_id): array;

    public function findOwnedByUser(UserId $user_id): array;

    public function findMembershipsByUser(UserId $user_id): array;

    public function userHasAccess(UserId $user_id, CompanyId $company_id): bool;
}
