<?php

declare(strict_types=1);

namespace App\Services\SignUp\Contracts;

use App\Services\SignUp\DTO\Requests\SignUpRequestDTO;
use App\Services\SignUp\DTO\SignUpDTO;

interface SignUpServiceContract
{
    public function signUp(SignUpRequestDTO $requestDTO): SignUpDTO;
}
