<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AuthMagicLink\Contracts\MagicLinkServiceContract;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(
        private MagicLinkServiceContract $magicLinkService,
    ) {
    }

    public function index(Request $request, string $link)
    {
        $fullUrlLink = route('auth.magic-link', ['token' => $link]);

        return view('pages.link-show', ['link' => $fullUrlLink]);
    }

    public function store(Request $request)
    {
        $tokenModel = $this->magicLinkService->createUserAuthToken(auth()->user()->id);

        return redirect()->route('link.index', $tokenModel->token);
    }

    public function revoke(Request $request)
    {
        $this->magicLinkService->revokeAuthToken(auth()->id());

        return redirect()->back();
    }
}
