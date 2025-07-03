<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Contracts;

use App\Services\GameCalculation\DTO\GameCalculationResultDTO;

interface GameManagerContract
{
    /**
     * Method is processing business-logic calculation relative from score
     * and return pre-formatted DTO for feature operations
     */
    public function calculate(int $score): GameCalculationResultDTO;
}
