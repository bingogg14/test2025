<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink;

use App\Models\UserAuthToken;
use App\Services\AuthMagicLink\Contracts\MagicLinkActivatorContract;

final readonly class MagicLinkActivator implements MagicLinkActivatorContract
{
    public function activate(int $userId, string $token): bool
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

        return $tokenModel->update([
            'active'     => true,
            'expired_at' => now()->addDays(7), // can move in config or use other method
        ]);
    }
}
