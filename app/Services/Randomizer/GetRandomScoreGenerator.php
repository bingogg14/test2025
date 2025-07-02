<?php

declare(strict_types=1);

namespace App\Services\Randomizer;

use App\Services\Randomizer\Contracts\RandomScoreGenerator;
use Random\RandomException;

class GetRandomScoreGenerator implements RandomScoreGenerator
{
    /**
     * @throws RandomException
     */
    public function __invoke(): int
    {
        return $this->generate();
    }

    /**
     * @throws RandomException
     */
    public function generate(): int
    {
        return random_int(1, 1000);
    }
}
