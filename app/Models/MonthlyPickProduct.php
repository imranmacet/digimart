<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyPickProduct extends Model
{
    protected $fillable = ['id', 'content', 'item_ids', 'title'];

    protected $casts = ['item_ids' => 'array'];
}
