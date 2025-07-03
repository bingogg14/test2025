<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Contracts;

use App\Enums\StatusGame;

interface GameCalculationContractStrategy extends GameCalculationContract
{
    /**
     * Method validating score on possible calculate
     */
    public function isValid(int $score): bool;

    /**
     * Method return status of game strategy
     */
    public static function getStatus(): StatusGame;

    /**
     * Method return priority of check and calculate type of strategy
     * if number is bigger it will be run & check first
     */
    public static function getPriority(): int;
}
