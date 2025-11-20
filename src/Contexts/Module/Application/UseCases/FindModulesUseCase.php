<?php

namespace Src\Contexts\Module\Application\UseCases;

use Src\Contexts\Module\Application\DTOs\ModuleDTO;
use Src\Contexts\Module\Domain\Contracts\ModuleRepositoryContract;
use Src\Contexts\Module\Domain\Entities\Module;

final class FindModulesUseCase
{
    public function __construct(
        private readonly ModuleRepositoryContract $repository
    ) {}

    public function __invoke(): array
    {
        $data = $this->repository->search();

        return array_map(fn (Module $module) => ModuleDTO::fromEntity($module), $data);
    }
}
