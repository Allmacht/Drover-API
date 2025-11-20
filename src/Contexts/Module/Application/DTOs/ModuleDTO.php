<?php

namespace Src\Contexts\Module\Application\DTOs;

use Src\Contexts\Module\Domain\Entities\Module;

class ModuleDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $icon,
        public string $color,
        public ?string $banner_url,
        public array $features,
        public array $metadata,
        public bool $is_required,
        public bool $is_active,
        public bool $is_beta,
        public int $sort_order,
        public array $requires_modules,
        public array $conflicts_with
    ) {}

    public static function fromEntity(Module $module): self
    {
        return new self(
            $module->id()->value(),
            $module->name()->value(),
            $module->description()->value(),
            $module->icon()->value(),
            $module->color()->value(),
            $module->banner_url()->value(),
            $module->features()->value(),
            $module->metadata()->value(),
            $module->is_required()->value(),
            $module->is_active()->value(),
            $module->is_beta()->value(),
            $module->sort_order()->value(),
            $module->requires_modules()->value(),
            $module->conflicts_with()->value()
        );
    }
}
