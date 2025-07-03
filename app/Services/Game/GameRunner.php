<?php

declare(strict_types=1);

namespace App\Services\Game;

use App\Services\Game\Contracts\GameRunnerContract;
use App\Services\Game\Contracts\UserGameHistoryFactoryContract;
use App\Services\GameCalculation\Contracts\GameManagerContract;
use App\Services\GameCalculation\DTO\GameCalculationResultDTO;
use App\Services\Randomizer\Contracts\RandomScoreGenerator;

readonly class GameRunner implements GameRunnerContract
{
    public function __construct(
        private GameManagerContract $gameManager,
        private RandomScoreGenerator $randomScoreGenerator,
        private UserGameHistoryFactoryContract $userGameHistoryFactory,
    ) {

    }

    public function run(int $userId): GameCalculationResultDTO
    {
        $score  = $this->randomScoreGenerator->generate();
        $result = $this->gameManager->calculate($score);

        $history = $this->userGameHistoryFactory->createHistory($result, $userId);
        $history->save();

        return $result;
    }
}
