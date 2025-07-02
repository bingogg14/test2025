<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Contracts;

use App\Enums\StatusGame;

interface GameCalculationContract
{
    /**
     * Method is processing business-logic calculation relative from score
     * and return result relative of score
     *
     * @param  int  $score
     * @return float
     */
    public function calculate(int $score): float;
}
