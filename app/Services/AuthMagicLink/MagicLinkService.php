<?php

declare(strict_types=1);

namespace App\Services\AuthMagicLink;

use App\Models\UserAuthToken;
use App\Services\AuthMagicLink\Contracts\MagicLinkActivatorContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkAuthorizeContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkFactoryContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkRevokerContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkServiceContract;
use Illuminate\Support\Facades\Session;

final readonly class MagicLinkService implements MagicLinkServiceContract
{
    public function __construct(
        private MagicLinkActivatorContract $magicLinkActivator,
        private MagicLinkRevokerContract $magicLinkRevoker,
        private MagicLinkFactoryContract $magicLinkFactory,
        private MagicLinkAuthorizeContract $magicLinkAuthorize,
    ) {}

    public function activate(int $userId, string $token): bool
    {
        return $this->magicLinkActivator->activate($userId, $token);
    }

    public function createUserAuthToken(int $userId): UserAuthToken
    {
        $tokenModel = $this->magicLinkFactory->createUserAuthToken($userId);
        $tokenModel->save();

        $this->putAuthToken($tokenModel->token);

        // Todo: can be revoke other tokens

        return $tokenModel;
    }

    public function putAuthToken(string $token): bool
    {
        Session::put('last_magic_token', $token);
        return true;
    }

    public function revoke(int $userId, string $token): bool
    {
        return $this->magicLinkRevoker->revoke($userId, $token);
    }

    public function revokeAuthToken(int $userId): bool
    {
        $token = Session::get('last_magic_token');

        if ($token !== null && $this->magicLinkRevoker->revoke($userId, $token)) {
            Session::forget('last_magic_token');
            return true;
        };

        return false;
    }

    public function authorize(string $token): bool
    {
        return $this->magicLinkAuthorize->authorize($token);
    }
}
