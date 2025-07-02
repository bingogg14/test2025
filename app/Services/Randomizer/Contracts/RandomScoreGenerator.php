<?php

declare(strict_types=1);

namespace App\Services\Randomizer\Contracts;

interface RandomScoreGenerator
{
    public function generate(): int;
}
