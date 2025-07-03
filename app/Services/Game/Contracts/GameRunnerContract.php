<?php

declare(strict_types=1);

namespace App\Services\Game\Contracts;

use App\Services\GameCalculation\DTO\GameCalculationResultDTO;

interface GameRunnerContract
{
    public function run(int $userId): GameCalculationResultDTO;
}
