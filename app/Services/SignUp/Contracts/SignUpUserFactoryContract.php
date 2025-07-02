<?php

declare(strict_types=1);

namespace App\Services\SignUp\Contracts;

use App\Models\User;
use App\Services\SignUp\DTO\Requests\SignUpRequestDTO;

interface SignUpUserFactoryContract
{
    public function createUser(SignUpRequestDTO $signUpRequestDto): User;
}
