<?php

namespace Src\Contexts\Module\Domain\Contracts;

interface ModuleRepositoryContract
{
    public function search(array $criteria = []): array;
}
