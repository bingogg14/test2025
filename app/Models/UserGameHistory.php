<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\StatusGame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGameHistory extends Model
{
    protected $table = 'user_game_histories';

    // off updated_at column
    public const UPDATED_AT = null;

    protected $fillable = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => StatusGame::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
