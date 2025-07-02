<?php

declare(strict_types=1);

namespace App\Services\SignUp\Factory;

use App\Models\User;
use App\Services\SignUp\Contracts\SignUpUserFactoryContract;
use App\Services\SignUp\DTO\Requests\SignUpRequestDTO;

class SignUpUserFactory implements SignUpUserFactoryContract {

    public function createUser(SignUpRequestDTO $signUpRequestDto): User
    {
        $model = new User();
        $model->username = $signUpRequestDto->username;
        $model->phone = $signUpRequestDto->phone;
        return $model;
    }
}
