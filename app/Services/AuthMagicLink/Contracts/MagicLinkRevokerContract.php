<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Contracts;

interface MagicLinkRevokerContract
{
    public function revoke(int $userId, string $token): bool;
}
