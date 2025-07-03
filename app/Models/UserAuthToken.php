<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $active
 * @property string $token
 * @property string $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAuthToken whereUserId($value)
 * @mixin \Eloquent
 */
class UserAuthToken extends Model
{
    protected $table = 'user_auth_tokens';

    protected $fillable = [];

    protected $hidden = [
        'token',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
