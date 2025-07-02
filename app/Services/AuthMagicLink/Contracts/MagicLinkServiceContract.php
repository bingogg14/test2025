<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Contracts;

interface MagicLinkServiceContract extends MagicLinkFactoryContract, MagicLinkActivatorContract, MagicLinkRevokerContract, MagicLinkAuthorizeContract
{
    public function revokeAuthToken(int $userId): bool;
    public function putAuthToken(string $token): bool;
}
