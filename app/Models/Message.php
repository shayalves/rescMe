<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'title', 'content', 'status', 'expires_at', 'canceled_at'])]
#[Hidden(['deleted_at'])]
class Message extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'user_id' => 'integer',
        'status' => 'integer',
        'expires_at' => 'datetime',
        'canceled_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the user that owns the message.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the contacts associated with the message.
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'messages_contacts')
            ->using(MessageContact::class)
            ->withTimestamps();
    }

    // Message status constants.
    public const STATUS_CANCELED = 0;

    public const STATUS_ACTIVE = 1;

    public const STATUS_SENDING = 2;

    public const STATUS_SENT = 3;

    // Mapping of status values to human‑readable labels
    public const STATUS_LABELS = [
        self::STATUS_CANCELED => 'canceled',
        self::STATUS_ACTIVE => 'active',
        self::STATUS_SENDING => 'sending',
        self::STATUS_SENT => 'sent',
    ];
}
