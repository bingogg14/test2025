<?php

declare(strict_types=1);

namespace Tests\Unit\RandomGenerator;

use App\Services\Randomizer\Contracts\RandomScoreGenerator;
use App\Services\Randomizer\GetRandomScoreGenerator;
use Tests\TestCase;

class RandomScoreGeneratorTest extends TestCase
{
    /**
     * Check type of return Random generator
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_random_score_generator_on_type(): void {
        $generator = $this->app->make(RandomScoreGenerator::class);
        $this->assertIsInt($generator->generate());
    }

    /**
     * Check on binding interface random generator
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_random_score_binding(): void {
        $this->assertInstanceOf(
            GetRandomScoreGenerator::class,
            $this->app->make(RandomScoreGenerator::class)
        );
    }


    public function test_random_score_min_max_values(): void
    {
        $generator = $this->app->make(RandomScoreGenerator::class);

        for ($i=0; $i < 20; $i++) {
            $score = $generator->generate();
            $this->assertLessThanOrEqual(1000, $score);
            $this->assertGreaterThanOrEqual(1, $score);
        }
    }
}
