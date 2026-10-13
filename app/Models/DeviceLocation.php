<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['device_id', 'latitude', 'longitude', 'accuracy', 'recorded_at'])]
class DeviceLocation extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'accuracy' => 'float',
            'recorded_at' => 'datetime',
        ];
    }

    /**
     * Get the device that reported the location.
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
