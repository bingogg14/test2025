<?php

declare(strict_types=1);

namespace Unit\GameCalculation;

use App\Services\GameCalculation\Contracts\GameCalculationStrategy;
use App\Services\GameCalculation\Strategies\Loose\NotEvenScoreStrategy;
use App\Services\GameCalculation\Strategies\Win\FiftyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\SeventyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\TenPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\ThirtyPercentStrategy;
use PHPUnit\Framework\TestCase;

class GameCalculationLooseStrategyTest extends TestCase
{
    public static function providerLooseStrategy(): array
    {
        return [
            [new NotEvenScoreStrategy(), 953, 0, 954],
        ];
    }

    /**
     * Check calculate is correct each loose strategy
     *
     * @dataProvider providerLooseStrategy
     *
     * @param  GameCalculationStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedSum
     * @param  int  $invalidScore
     * @return void
     */
    public function test_calculate_correct_loose_strategy(
        GameCalculationStrategy $strategy,
        int $score,
        float $expectedSum,
        int $invalidScore,
    ): void {
        $this->assertTrue($strategy->isValid($score));
        $this->assertEqualsWithDelta(
            $expectedSum,
            $strategy->calculate($score),
            0.00001
        );
    }

    /**
     * Check on invalid score each loose strategy
     *
     * @dataProvider providerLooseStrategy
     *
     * @param  GameCalculationStrategy  $strategy
     * @param  int  $score
     * @param  float  $expectedSum
     * @param  int  $invalidScore
     * @return void
     */
    public function test_valid_false_below_threshold_loose_strategy(
        GameCalculationStrategy $strategy,
        int $score,
        float $expectedSum,
        int $invalidScore
    ): void
    {
        $this->assertFalse($strategy->isValid($invalidScore));
    }
}
