<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseItem extends Model
{

    function item() : BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');     
    }

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');     
    }
}
