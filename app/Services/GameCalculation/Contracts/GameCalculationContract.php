<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Contracts;

interface GameCalculationContract
{
    /**
     * Method is processing business-logic calculation relative from score
     * and return result relative of score
     */
    public function calculate(int $score): float;
}
