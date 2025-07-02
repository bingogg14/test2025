<?php

declare(strict_types=1);

namespace App\Services\GameCalculation\DTO;

use App\Enums\StatusGame;
use Carbon\CarbonImmutable;

final readonly class GameCalculationResultDTO
{
    public function __construct(
        public float $sum,
        public float $score,
        public StatusGame $status,
        public CarbonImmutable $createdAt
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
            'createdAt' => CarbonImmutable::now()->toDateTimeString(),
        ];
    }
}
