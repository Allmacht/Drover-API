<?php

namespace Src\Contexts\Authorization\Infrastructure\Http\Controllers;

use Src\Contexts\Authorization\Application\UseCases\SignOutUseCase;

final class SignOutController
{
    public function __construct(
        private SignOutUseCase $signOutUseCase
    ) {}

    public function __invoke(): void
    {
        ($this->signOutUseCase)(user_id: auth()->user()->id);
    }
}
