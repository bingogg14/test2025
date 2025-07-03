<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink;

use App\Models\UserAuthToken;
use App\Services\AuthMagicLink\Contracts\MagicLinkAuthorizeContract;
use Illuminate\Support\Facades\Auth;

final readonly class MagicLinkAuthorize implements MagicLinkAuthorizeContract
{
    public function authorize(string $token): bool
    {
        // can be use repo
        $tokenModel = UserAuthToken::query()
            ->with('user')
            ->where('token', $token)
            ->where('active', true)
            ->where('expired_at', '>', now())
            ->first();

        if (! $tokenModel) {
            return false;
        }

        Auth::login($tokenModel->user);

        return true;
    }
}
