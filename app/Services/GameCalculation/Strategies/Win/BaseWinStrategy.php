<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Win;

use App\Enums\StatusGame;
use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;

abstract class BaseWinStrategy implements GameCalculationContractStrategy
{
    /** {@inheritDoc} **/
    public static function getStatus(): StatusGame
    {
        return StatusGame::WIN;
    }

    /**
     * Formatter result float to float with 2-digits after comma
     *  - example: 5.55
     */
    protected function formatScore(float $score): float
    {
        return round($score, 2);
    }
}
