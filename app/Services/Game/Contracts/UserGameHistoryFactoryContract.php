<?php

declare(strict_types=1);

namespace App\Services\Game\Contracts;

use App\Models\UserGameHistory;
use App\Services\GameCalculation\DTO\GameCalculationResultDTO;

interface UserGameHistoryFactoryContract
{
    public function createHistory(GameCalculationResultDTO $resultDTO, int $userId): UserGameHistory;
}
