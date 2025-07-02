<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Contracts;

interface MagicLinkActivatorContract
{
    public function activate(int $userId, string $token): bool;
}
