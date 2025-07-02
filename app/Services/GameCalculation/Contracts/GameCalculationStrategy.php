<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\Contracts;

use App\Enums\StatusGame;

interface GameCalculationStrategy extends GameCalculation
{
    /**
     * Method validating score on possible calculate
     *
     * @param  int  $score
     * @return bool
     */
    public function isValid(int $score): bool;

    /**
     * Method return status of game strategy
     *
     * @return StatusGame
     */
    public static function getStatus(): StatusGame;

    /**
     * Method return priority of check and calculate type of strategy
     * if number is bigger it will be run & check first
     *
     * @return int
     */
    public static function getPriority(): int;
}
