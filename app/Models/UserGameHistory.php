<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\StatusGame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $sum
 * @property string $score
 * @property StatusGame $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserGameHistory whereUserId($value)
 * @mixin \Eloquent
 */
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
            'status' => StatusGame::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
