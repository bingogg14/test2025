<?php

namespace App\Enums;

enum StatusGame: int
{
    case LOOSE = 0;
    case WIN = 1;

    public function getLabel(): string
    {
        return match ($this) {
            self::LOOSE => 'loose',
            self::WIN => 'win',
        };
    }
}
