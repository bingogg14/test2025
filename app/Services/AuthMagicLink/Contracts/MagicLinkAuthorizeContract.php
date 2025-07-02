<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Contracts;

interface MagicLinkAuthorizeContract
{
    public function authorize(string $token): bool;
}
