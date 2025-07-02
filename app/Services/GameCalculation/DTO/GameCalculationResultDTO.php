<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\DTO;

use App\Enums\StatusGame;

final readonly class GameCalculationResultDTO
{
    public function __construct(
        public float $sum,
        public float $score,
        public StatusGame $status,
    ) {}

    public function toArray(): array
    {
        return [
            'sum' => $this->sum,
            'score' => $this->score,
            'status' => [
                'value' => $this->status->value,
                'name' => $this->status->name,
            ],
        ];
    }
}
