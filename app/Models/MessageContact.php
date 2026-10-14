<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MessageContact extends Pivot
{
    use HasUuids;

    protected $table = 'messages_contacts';

    public $incrementing = false;
}
