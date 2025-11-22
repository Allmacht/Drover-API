<?php

namespace Src\Contexts\Company\Domain\Contracts;

use Src\Contexts\Company\Domain\Entities\Company;
use Src\Contexts\Company\Domain\ValueObjects\CompanyName;
use Src\Contexts\Company\Domain\ValueObjects\CompanyOwnerId;

interface CompanyRepositoryContract
{
    public function findByNameAndOwnerId(CompanyName $name, CompanyOwnerId $owner_id): ?Company;

    public function persist(Company $company): Company;
}
