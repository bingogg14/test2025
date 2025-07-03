<?php

declare(strict_types=1);

namespace App\Services\GameCalculation;

use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;
use App\Services\GameCalculation\Contracts\GameManagerContract;
use App\Services\GameCalculation\DTO\GameCalculationResultDTO;
use App\Services\GameCalculation\Exceptions\NotFoundStrategy;
use App\Services\GameCalculation\Exceptions\NotValidStrategyClass;

final readonly class GameCalculationManager implements GameManagerContract
{
    /**
     * All Strategies game if possible & sorted by priority
     *
     * @var GameCalculationContractStrategy[]
     */
    private array $strategies;

    /**
     * Create Manager class with multiply access strategies
     * - check each strategy on implement interface
     * - sort each strategy for choose strategy by priority
     *
     * @param GameCalculationContractStrategy[]|array $strategies
     */
    public function __construct(array $strategies)
    {

        // check param strategies on implement interface
        foreach ($strategies as $strategy) {
            if (! $strategy instanceof GameCalculationContractStrategy) {
                throw new NotValidStrategyClass();
            }
        }

        $items = $strategies;
        // sorting strategies by priority
        usort(
            $items,
            function (GameCalculationContractStrategy $a, GameCalculationContractStrategy $b): int {
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
            status: $strategy->getStatus(),
            createdAt: now()->toImmutable()
        );
    }

    /**
     * Get strategy for game & before get it validating pass on choose
     * specify strategy
     */
    private function getStrategy(int $score): GameCalculationContractStrategy
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->isValid($score)) {
                return $strategy;
            }
        }

        throw new NotFoundStrategy();
    }
}
