<?php

declare(strict_types=1);

namespace App\Services\SignUp\DTO;

readonly class SignUpDTO
{
    public function __construct(
        public int $userId,
        public string $username,
        public string $magicLink
    ) {
    }
}
