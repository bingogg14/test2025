<?php

declare(strict_types=1);

namespace App\Services\SignUp\DTO\Requests;

readonly class SignUpRequestDTO
{
    public function __construct(
        public string $username,
        public string $phone
    ) {}

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'phone' => $this->phone,
        ];
    }
}
