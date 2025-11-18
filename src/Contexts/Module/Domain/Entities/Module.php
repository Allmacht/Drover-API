<?php

namespace Src\Contexts\Module\Domain\Entities;

use Src\Contexts\Module\Domain\ValueObjects\ModuleBannerUrl;
use Src\Contexts\Module\Domain\ValueObjects\ModuleCategory;
use Src\Contexts\Module\Domain\ValueObjects\ModuleColor;
use Src\Contexts\Module\Domain\ValueObjects\ModuleConflictsWith;
use Src\Contexts\Module\Domain\ValueObjects\ModuleDescription;
use Src\Contexts\Module\Domain\ValueObjects\ModuleFeatures;
use Src\Contexts\Module\Domain\ValueObjects\ModuleIcon;
use Src\Contexts\Module\Domain\ValueObjects\ModuleId;
use Src\Contexts\Module\Domain\ValueObjects\ModuleIsActive;
use Src\Contexts\Module\Domain\ValueObjects\ModuleIsBeta;
use Src\Contexts\Module\Domain\ValueObjects\ModuleIsRequired;
use Src\Contexts\Module\Domain\ValueObjects\ModuleMetadata;
use Src\Contexts\Module\Domain\ValueObjects\ModuleName;
use Src\Contexts\Module\Domain\ValueObjects\ModuleRequiresModules;
use Src\Contexts\Module\Domain\ValueObjects\ModuleShortDescription;
use Src\Contexts\Module\Domain\ValueObjects\ModuleSlug;
use Src\Contexts\Module\Domain\ValueObjects\ModuleSortOrder;

final readonly class Module
{
    private function __construct(
        private ModuleId $id,
        private ModuleName $name,
        private ModuleSlug $slug,
        private ModuleDescription $description,
        private ModuleShortDescription $short_description,
        private ModuleCategory $category,
        private ModuleIsRequired $is_required,
        private ModuleIsActive $is_active,
        private ModuleIsBeta $is_beta,
        private ModuleSortOrder $sort_order,
        private ModuleRequiresModules $requires_modules,
        private ModuleConflictsWith $conflicts_with,
        private ModuleIcon $icon,
        private ModuleColor $color,
        private ModuleBannerUrl $banner_url,
        private ModuleFeatures $features,
        private ModuleMetadata $metadata
    ) {
    }

    public function id(): ModuleId
    {
        return $this->id;
    }

    public function name(): ModuleName
    {
        return $this->name;
    }

    public function slug(): ModuleSlug
    {
        return $this->slug;
    }

    public function description(): ModuleDescription
    {
        return $this->description;
    }

    public function shortDescription(): ModuleShortDescription
    {
        return $this->short_description;
    }

    public function category(): ModuleCategory
    {
        return $this->category;
    }

    public function isRequired(): ModuleIsRequired
    {
        return $this->is_required;
    }

    public function isActive(): ModuleIsActive
    {
        return $this->is_active;
    }

    public function isBeta(): ModuleIsBeta
    {
        return $this->is_beta;
    }

    public function sortOrder(): ModuleSortOrder
    {
        return $this->sort_order;
    }

    public function requiresModules(): ModuleRequiresModules
    {
        return $this->requires_modules;
    }

    public function conflictsWith(): ModuleConflictsWith
    {
        return $this->conflicts_with;
    }

    public function icon(): ModuleIcon
    {
        return $this->icon;
    }

    public function color(): ModuleColor
    {
        return $this->color;
    }

    public function bannerUrl(): ModuleBannerUrl
    {
        return $this->banner_url;
    }

    public function features(): ModuleFeatures
    {
        return $this->features;
    }

    public function metadata(): ModuleMetadata
    {
        return $this->metadata;
    }

    public static function create(
        ModuleName $name,
        ModuleSlug $slug,
        ModuleDescription $description,
        ModuleShortDescription $short_description,
        ModuleCategory $category,
        ModuleIsRequired $is_required,
        ModuleIsActive $is_active,
        ModuleIsBeta $is_beta,
        ModuleSortOrder $sort_order,
        ModuleRequiresModules $requires_modules,
        ModuleConflictsWith $conflicts_with,
        ModuleIcon $icon,
        ModuleColor $color,
        ModuleBannerUrl $banner_url,
        ModuleFeatures $features,
        ModuleMetadata $metadata
    ): static {
        return new self(
            id: ModuleId::generate(),
            name: $name,
            slug: $slug,
            description: $description,
            short_description: $short_description,
            category: $category,
            is_required: $is_required,
            is_active: $is_active,
            is_beta: $is_beta,
            sort_order: $sort_order,
            requires_modules: $requires_modules,
            conflicts_with: $conflicts_with,
            icon: $icon,
            color: $color,
            banner_url: $banner_url,
            features: $features,
            metadata: $metadata,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $name,
        string $slug,
        string $description,
        string $short_description,
        string $category,
        bool $is_required,
        bool $is_active,
        bool $is_beta,
        int $sort_order,
        array $requires_modules,
        array $conflicts_with,
        string $icon,
        string $color,
        string $banner_url,
        array $features,
        array $metadata
    ): self {
        return new self(
            id: ModuleId::fromString($id),
            name: ModuleName::fromString($name),
            slug: ModuleSlug::fromString($slug),
            description: ModuleDescription::fromString($description),
            short_description: ModuleShortDescription::fromString($short_description),
            category: ModuleCategory::fromString($category),
            is_required: ModuleIsRequired::fromBool($is_required),
            is_active: ModuleIsActive::fromBool($is_active),
            is_beta: ModuleIsBeta::fromBool($is_beta),
            sort_order: ModuleSortOrder::fromInt($sort_order),
            requires_modules: ModuleRequiresModules::fromArray($requires_modules),
            conflicts_with: ModuleConflictsWith::fromArray($conflicts_with),
            icon: ModuleIcon::fromString($icon),
            color: ModuleColor::fromString($color),
            banner_url: ModuleBannerUrl::fromString($banner_url),
            features: ModuleFeatures::fromArray($features),
            metadata: ModuleMetadata::fromArray($metadata),
        );
    }
}
