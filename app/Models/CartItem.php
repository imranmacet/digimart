<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);     
    }
}
