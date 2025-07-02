<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Services\SignUp\Contracts\SignUpServiceContract;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function __construct(
        private readonly SignUpServiceContract $signUpService
    ) {

    }

    public function index(Request $request)
    {
        return view('pages.signup');
    }

    public function store(SignUpRequest $request)
    {
        $result = $this->signUpService->signUp($request->getDTO());

        return redirect()->route('link.index', $result->magicLink);
    }
}
