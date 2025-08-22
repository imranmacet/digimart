<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSaleBanner extends Model
{
    protected $fillable = ['title', 'offer', 'button_text', 'button_url', 'status'];
}
