<?php

declare(strict_types=1);

namespace App\Services\Game\Factory;

use App\Models\UserGameHistory;
use App\Services\Game\Contracts\UserGameHistoryFactoryContract;
use App\Services\GameCalculation\DTO\GameCalculationResultDTO;

class UserGameHistoryFactory implements UserGameHistoryFactoryContract
{
    public function createHistory(
        GameCalculationResultDTO $resultDTO,
        int $userId
    ): UserGameHistory {

        $model             = new UserGameHistory();
        $model->user_id    = $userId;
        $model->sum        = $resultDTO->sum;
        $model->score      = $resultDTO->score;
        $model->status     = $resultDTO->status;
        $model->created_at = $resultDTO->createdAt;

        return $model;
    }
}
