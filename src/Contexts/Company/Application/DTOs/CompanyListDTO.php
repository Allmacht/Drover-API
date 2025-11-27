<?php

namespace Src\Contexts\Company\Application\DTOs;

final class CompanyListDTO
{
    public function __construct(
        public array $owned,
        public array $memberships,
        public int $totalCount
    ) {}
}
