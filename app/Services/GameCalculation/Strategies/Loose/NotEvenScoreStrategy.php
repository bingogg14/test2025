<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Loose;

use App\Enums\StatusGame;
use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;

final class NotEvenScoreStrategy extends BaseLooseStrategy implements GameCalculationContractStrategy
{
    private const PRIORITY = 100; // 1 - check in list

    /** {@inheritDoc} **/
    public function isValid(int $score): bool
    {
        // check on not even
        return $score % 2 !== 0;
    }

    /** {@inheritDoc} **/
    public static function getPriority(): int
    {
        return self::PRIORITY;
    }
}
