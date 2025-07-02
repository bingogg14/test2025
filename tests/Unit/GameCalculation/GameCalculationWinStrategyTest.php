<?php

declare(strict_types=1);

namespace Unit\GameCalculation;

use App\Services\GameCalculation\Contracts\GameCalculationContractStrategy;
use App\Services\GameCalculation\Strategies\Win\FiftyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\SeventyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\TenPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\ThirtyPercentStrategy;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GameCalculationWinStrategyTest extends TestCase
{
    public static function providerWinsStrategy(): array
    {
        return [
            [new SeventyPercentStrategy(), 902, 631.4, 900],
            [new FiftyPercentStrategy(), 601, 300.5, 600],
            [new ThirtyPercentStrategy(), 301, 90.3, 300],
            [new TenPercentStrategy(), 300, 30, 302],
        ];
    }

    /**
     * Check calculate is correct each win strategy
     *
     * @param  GameCalculationContractStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedWin
     * @param  int  $invalidScore
     * @return void
     */
    #[DataProvider('providerWinsStrategy')]
    public function test_calculate_correct_wins_strategy(
        GameCalculationContractStrategy $strategy,
        int $score,
        float $expectedWin,
        int $invalidScore,
    ): void {
        $this->assertTrue($strategy->isValid($score));
        $this->assertEqualsWithDelta(
            $expectedWin,
            $strategy->calculate($score),
            0.00001
        );
    }

    /**
     * Check on invalid score each win strategy
     *
     * @param  GameCalculationContractStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedWin
     * @param  int  $invalidScore
     * @return void
     */
    #[DataProvider('providerWinsStrategy')]
    public function test_valid_false_below_threshold_wins_strategy(
        GameCalculationContractStrategy $strategy,
        int $score,
        float $expectedWin,
        int $invalidScore
    ): void
    {
        $this->assertFalse($strategy->isValid($invalidScore));
    }
}
