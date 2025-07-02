<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Win;

use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;

final class FiftyPercentStrategy extends BaseWinStrategy implements GameCalculationContractStrategy
{
    private const MIN_SCORE = 600;
    private const PERCENT = 0.5;
    private const PRIORITY = 3;

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
