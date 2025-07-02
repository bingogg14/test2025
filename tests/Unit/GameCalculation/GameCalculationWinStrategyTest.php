<?php

declare(strict_types=1);

namespace Unit\GameCalculation;

use App\Services\GameCalculation\Contracts\GameCalculationStrategy;
use App\Services\GameCalculation\Strategies\Win\FiftyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\SeventyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\TenPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\ThirtyPercentStrategy;
use PHPUnit\Framework\TestCase;

class GameCalculationWinStrategyTest extends TestCase
{
    public static function providerWinsStrategy(): array
    {
        return [
            [new SeventyPercentStrategy(), 901, 901 * 0.7, 900],
            [new FiftyPercentStrategy(), 601, 601 * 0.5, 600],
            [new ThirtyPercentStrategy(), 301, 301 * 0.3, 300],
            [new TenPercentStrategy(), 300, 300 * 0.1, 302],
        ];
    }

    /**
     * Check calculate is correct each win strategy
     *
     * @dataProvider providerWinsStrategy
     *
     * @param  GameCalculationStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedWin
     * @param  int  $invalidScore
     * @return void
     */
    public function test_calculate_correct_wins_strategy(
        GameCalculationStrategy $strategy,
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
     * @dataProvider providerWinsStrategy
     *
     * @param  GameCalculationStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedWin
     * @param  int  $invalidScore
     * @return void
     */
    public function test_valid_false_below_threshold_wins_strategy(
        GameCalculationStrategy $strategy,
        int $score,
        float $expectedWin,
        int $invalidScore
    ): void
    {
        $this->assertFalse($strategy->isValid($invalidScore));
    }
}
