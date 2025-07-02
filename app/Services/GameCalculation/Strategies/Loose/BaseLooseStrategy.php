<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Strategies\Loose;

use App\Enums\StatusGame;
use App\Services\GameCalculation\Contracts\GameCalculationStrategy;

abstract class BaseLooseStrategy implements GameCalculationStrategy
{
    /** {@inheritDoc} **/
    public function calculate(int $score): float
    {
        return 0;
    }

    /** {@inheritDoc} **/
    public static function getStatus(): StatusGame
    {
        return StatusGame::LOOSE;
    }
}
