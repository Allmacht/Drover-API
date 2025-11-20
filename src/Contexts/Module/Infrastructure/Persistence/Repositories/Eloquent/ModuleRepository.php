<?php

namespace Src\Contexts\Module\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\Module as EloquentModule;
use Src\Contexts\Module\Domain\Contracts\ModuleRepositoryContract;
use Src\Contexts\Module\Domain\Entities\Module;

class ModuleRepository implements ModuleRepositoryContract
{
    public function search(array $criteria = []): array
    {
        $query = EloquentModule::orderBy('sort_order', 'asc')->get();

        return $query->map(fn (EloquentModule $eloquentModule) => $this->mapToDomainEntity($eloquentModule))->toArray();
    }

    private function mapToDomainEntity(EloquentModule $eloquentModule): Module
    {
        return Module::fromPrimitives(
            id: $eloquentModule->id,
            name: $eloquentModule->name,
            slug: $eloquentModule->slug,
            description: $eloquentModule->description,
            short_description: $eloquentModule->short_description,
            category: $eloquentModule->category,
            is_required: (bool) $eloquentModule->is_required,
            is_active: (bool) $eloquentModule->is_active,
            is_beta: (bool) ($eloquentModule->is_beta ?? false),
            sort_order: (int) $eloquentModule->sort_order,
            requires_modules: $eloquentModule->requires_modules ?? [],
            conflicts_with: $eloquentModule->conflicts_with ?? [],
            icon: $eloquentModule->icon,
            color: $eloquentModule->color,
            banner_url: $eloquentModule->banner_url,
            features: $eloquentModule->features ?? [],
            metadata: $eloquentModule->metadata ?? []
        );
    }
}
