<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink;

use App\Models\UserAuthToken;
use App\Services\AuthMagicLink\Contracts\MagicLinkRevokerContract;

final readonly class MagicLinkRevoker implements MagicLinkRevokerContract
{
    public function revoke(int $userId, string $token): bool
    {
        // can be use repo
        $tokenModel = UserAuthToken::query()
            ->where('token', $token)
            ->where('user_id', $userId)
            ->lockForUpdate()
            ->first();

        if (! $tokenModel) {
            return false;
        }

        $tokenModel->active = false;

        return $tokenModel->save();
    }
}
