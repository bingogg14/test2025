<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Win;

use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;

final class SeventyPercentStrategy extends BaseWinStrategy implements GameCalculationContractStrategy
{
    private const MIN_SCORE = 900;
    private const PERCENT   = 0.7;
    private const PRIORITY  = 4;

    /** {@inheritDoc} **/
    public function isValid(int $score): bool
    {
        return $score > self::MIN_SCORE;
    }

    /** {@inheritDoc} **/
    public function calculate(int $score): float
    {
        return parent::formatScore($score * self::PERCENT);
    }

    /** {@inheritDoc} **/
    public static function getPriority(): int
    {
        return self::PRIORITY;
    }
}
