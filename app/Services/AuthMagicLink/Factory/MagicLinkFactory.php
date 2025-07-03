<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink\Factory;

use App\Models\UserAuthToken;
use App\Services\AuthMagicLink\Contracts\MagicLinkFactoryContract;

final class MagicLinkFactory implements MagicLinkFactoryContract
{
    public function createUserAuthToken(int $userId): UserAuthToken
    {
        $expiredAt = now()->addDays(7);

        $model             = new UserAuthToken();
        $model->user_id    = $userId;
        $model->active     = true;
        $model->token      = $this->getHash($userId, $expiredAt);
        $model->expired_at = $expiredAt;

        return $model;
    }

    private function getHash(int $userId, $expiredAt): string
    {
        $timestamp = time();

        return hash('sha256', $userId . $timestamp . $expiredAt . '_salt');
    }
}
