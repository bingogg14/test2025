<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\GameCalculation\Contracts\GameManager;
use App\Services\GameCalculation\GameCalculationManager;
use App\Services\GameCalculation\Strategies\Loose\NotEvenScoreStrategy;
use App\Services\GameCalculation\Strategies\Win\FiftyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\SeventyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\TenPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\ThirtyPercentStrategy;
use App\Services\Randomizer\Contracts\RandomScoreGenerator;
use App\Services\Randomizer\GetRandomScoreGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register RandomGenerator
        $this->app->singleton(RandomScoreGenerator::class, GetRandomScoreGenerator::class);

        // Register Strategies
        $this->app->singleton(NotEvenScoreStrategy::class);
        $this->app->singleton(SeventyPercentStrategy::class);
        $this->app->singleton(FiftyPercentStrategy::class);
        $this->app->singleton(ThirtyPercentStrategy::class);
        $this->app->singleton(TenPercentStrategy::class);

        // Register Game Manager
        $this->app->singleton(GameManager::class, function($app) {
            return new GameCalculationManager([
                $app->make(NotEvenScoreStrategy::class),
                $app->make(SeventyPercentStrategy::class),
                $app->make(FiftyPercentStrategy::class),
                $app->make(ThirtyPercentStrategy::class),
                $app->make(TenPercentStrategy::class),
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
