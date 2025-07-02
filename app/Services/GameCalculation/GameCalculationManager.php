<?php

declare(strict_types=1);

namespace App\Services\GameCalculation;

use App\Services\GameCalculation\Contracts\GameCalculationStrategy;
use App\Services\GameCalculation\Contracts\GameManager;
use App\Services\GameCalculation\DTO\GameCalculationResultDTO;
use NotFoundStrategy;
use NotValidStrategyClass;

final readonly class GameCalculationManager implements GameManager
{
    /**
     * All Strategies game if possible & sorted by priority
     *
     * @var GameCalculationStrategy[]
     */
    private array $strategies;

    /**
     * Create Manager class with multiply access strategies
     * - check each strategy on implement interface
     * - sort each strategy for choose strategy by priority
     *
     * @param  GameCalculationStrategy[]|array  $strategies
     */
    public function __construct(array $strategies)
    {

        // check param strategies on implement interface
        foreach ($strategies as $strategy) {
            if (! $strategy instanceof GameCalculationStrategy) {
                throw new NotValidStrategyClass;
            }
        }

        $items = $strategies;
        // sorting strategies by priority
        usort(
            $items,
            function (GameCalculationStrategy $a, GameCalculationStrategy $b): int {
                return $b::getPriority() <=> $a::getPriority();
            }
        );

        $this->strategies = $items;
        // clear not-used variable
        unset($items);
    }

    /** {@inheritDoc} */
    public function calculate(int $score): GameCalculationResultDTO
    {
        $strategy = $this->getStrategy($score);

        return new GameCalculationResultDTO(
            sum: $strategy->calculate($score),
            score: $score,
            status: $strategy->getStatus()
        );
    }

    /**
     * Get strategy for game & before get it validating pass on choose
     * specify strategy
     */
    private function getStrategy(int $score): GameCalculationStrategy
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->isValid($score)) {
                return $strategy;
            }
        }

        throw new NotFoundStrategy;
    }
}
