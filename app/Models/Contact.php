<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'name'])]
class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the user that owns the contact.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the emails for the contact.
     */
    public function emails(): HasMany
    {
        return $this->hasMany(ContactEmail::class);
    }

    /**
     * Get the phones for the contact.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(ContactPhone::class);
    }
}
