<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Contracts;

use App\Models\UserAuthToken;

interface MagicLinkFactoryContract
{
    public function createUserAuthToken(int $userId): UserAuthToken;
}
