<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AuthMagicLink\Contracts\MagicLinkServiceContract;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly MagicLinkServiceContract $magicLinkService,
    ) {}

    public function authorize(Request $request, string $token)
    {
        if ($this->magicLinkService->authorize($token)) {
            return redirect()->route('game.index');
        }

        return redirect()->route('signup.index');
    }
}
