<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'message', 'status', 'latitude', 'longitude'])]
class Emergency extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'user_id' => 'integer',
        'status' => 'integer',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /**
     * Get the user that owns the emergency.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
