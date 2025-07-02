<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Win;

use App\Services\GameCalculation\Contracts\GameCalculationStrategy;

final class FiftyPercentStrategy extends BaseWinStrategy implements GameCalculationStrategy
{
    private const MIN_SCORE = 600;
    private const PERCENT = 0.5;
    private const PRIORITY = 3; // 3 - check in list

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
