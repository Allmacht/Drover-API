<?php

namespace Src\Contexts\OnboardingSession\Domain\Entities;

use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionCompanyId;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionCompletedAt;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionCurrentStep;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionId;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionLastInteractionAt;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionMetadata;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionPricingSnapshot;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionSelectedModules;
use Src\Contexts\OnboardingSession\Domain\ValueObjects\OnboardingSessionStatus;

final readonly class OnboardingSession
{
    private function __construct(
        private OnboardingSessionId $id,
        private OnboardingSessionCompanyId $company_id,
        private OnboardingSessionCurrentStep $current_step,
        private OnboardingSessionStatus $status,
        private OnboardingSessionSelectedModules $selected_modules,
        private OnboardingSessionPricingSnapshot $pricing_snapshot,
        private OnboardingSessionMetadata $metadata,
        private OnboardingSessionCompletedAt $completed_at,
        private OnboardingSessionLastInteractionAt $last_interaction_at,
    ) {
    }

    public function id(): OnboardingSessionId
    {
        return $this->id;
    }

    public function company_id(): OnboardingSessionCompanyId
    {
        return $this->company_id;
    }

    public function current_step(): OnboardingSessionCurrentStep
    {
        return $this->current_step;
    }

    public function status(): OnboardingSessionStatus
    {
        return $this->status;
    }

    public function selected_modules(): OnboardingSessionSelectedModules
    {
        return $this->selected_modules;
    }

    public function pricing_snapshot(): OnboardingSessionPricingSnapshot
    {
        return $this->pricing_snapshot;
    }

    public function metadata(): OnboardingSessionMetadata
    {
        return $this->metadata;
    }

    public function completed_at(): OnboardingSessionCompletedAt
    {
        return $this->completed_at;
    }

    public function last_interaction_at(): OnboardingSessionLastInteractionAt
    {
        return $this->last_interaction_at;
    }

    public static function create(
        OnboardingSessionCompanyId $company_id,
        OnboardingSessionCurrentStep $current_step,
        OnboardingSessionStatus $status,
        OnboardingSessionSelectedModules $selected_modules,
        OnboardingSessionPricingSnapshot $pricing_snapshot,
        OnboardingSessionMetadata $metadata,
        OnboardingSessionCompletedAt $completed_at,
        OnboardingSessionLastInteractionAt $last_interaction_at,
    ): static {
        return new self(
            id: OnboardingSessionId::generate(),
            company_id: $company_id,
            current_step: $current_step,
            status: $status,
            selected_modules: $selected_modules,
            pricing_snapshot: $pricing_snapshot,
            metadata: $metadata,
            completed_at: $completed_at,
            last_interaction_at: $last_interaction_at,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $company_id,
        string $current_step,
        string $status,
        array $selected_modules,
        array $pricing_snapshot,
        array $metadata,
        string $completed_at,
        string $last_interaction_at,
    ): self {
        return new self(
            id: OnboardingSessionId::fromString($id),
            company_id: OnboardingSessionCompanyId::fromString($company_id),
            current_step: OnboardingSessionCurrentStep::fromString($current_step),
            status: OnboardingSessionStatus::fromString($status),
            selected_modules: OnboardingSessionSelectedModules::fromArray($selected_modules),
            pricing_snapshot: OnboardingSessionPricingSnapshot::fromArray($pricing_snapshot),
            metadata: OnboardingSessionMetadata::fromArray($metadata),
            completed_at: OnboardingSessionCompletedAt::fromString($completed_at),
            last_interaction_at: OnboardingSessionLastInteractionAt::fromString($last_interaction_at),
        );
    }
}
