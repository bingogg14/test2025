<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthMagicLink\Contracts\MagicLinkActivatorContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkAuthorizeContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkFactoryContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkRevokerContract;
use App\Services\AuthMagicLink\Contracts\MagicLinkServiceContract;
use App\Services\AuthMagicLink\Factory\MagicLinkFactory;
use App\Services\AuthMagicLink\MagicLinkActivator;
use App\Services\AuthMagicLink\MagicLinkAuthorize;
use App\Services\AuthMagicLink\MagicLinkRevoker;
use App\Services\AuthMagicLink\MagicLinkService;
use App\Services\Game\Contracts\GameRunnerContract;
use App\Services\Game\Contracts\UserGameHistoryFactoryContract;
use App\Services\Game\Factory\UserGameHistoryFactory;
use App\Services\Game\GameRunner;
use App\Services\GameCalculation\Contracts\GameManagerContract;
use App\Services\GameCalculation\GameCalculationManager;
use App\Services\GameCalculation\Strategies\Loose\NotEvenScoreStrategy;
use App\Services\GameCalculation\Strategies\Win\FiftyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\SeventyPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\TenPercentStrategy;
use App\Services\GameCalculation\Strategies\Win\ThirtyPercentStrategy;
use App\Services\Randomizer\Contracts\RandomScoreGenerator;
use App\Services\Randomizer\GetRandomScoreGenerator;
use App\Services\SignUp\Contracts\SignUpServiceContract;
use App\Services\SignUp\Contracts\SignUpUserFactoryContract;
use App\Services\SignUp\Factory\SignUpUserFactory;
use App\Services\SignUp\SignUpService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register Game
        $this->app->singleton(UserGameHistoryFactoryContract::class, UserGameHistoryFactory::class);
        $this->app->singleton(GameRunnerContract::class, GameRunner::class);

        // Register SignUp
        $this->app->singleton(SignUpUserFactoryContract::class, SignUpUserFactory::class);
        $this->app->singleton(SignUpServiceContract::class, SignUpService::class);

        // Register AuthMagicLink
        $this->app->singleton(MagicLinkAuthorizeContract::class, MagicLinkAuthorize::class);
        $this->app->singleton(MagicLinkActivatorContract::class, MagicLinkActivator::class);
        $this->app->singleton(MagicLinkRevokerContract::class, MagicLinkRevoker::class);
        $this->app->singleton(MagicLinkFactoryContract::class, MagicLinkFactory::class);
        $this->app->singleton(MagicLinkServiceContract::class, MagicLinkService::class);

        // Register RandomGenerator
        $this->app->singleton(RandomScoreGenerator::class, GetRandomScoreGenerator::class);

        // Register Strategies
        $this->app->singleton(NotEvenScoreStrategy::class);
        $this->app->singleton(SeventyPercentStrategy::class);
        $this->app->singleton(FiftyPercentStrategy::class);
        $this->app->singleton(ThirtyPercentStrategy::class);
        $this->app->singleton(TenPercentStrategy::class);

        // Register Game Manager
        $this->app->singleton(GameManagerContract::class, function ($app) {
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
