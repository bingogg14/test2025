<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Win;

use App\Services\GameCalculation\Contracts\GameCalculationStrategy;

final class TenPercentStrategy extends BaseWinStrategy implements GameCalculationStrategy
{
    private const MAX_SCORE = 300;
    private const PERCENT = 0.1;
    private const PRIORITY = 2; // 4 - check in list

    /** {@inheritDoc} **/
    public function isValid(int $score): bool
    {
        return $score <= self::MAX_SCORE;
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
