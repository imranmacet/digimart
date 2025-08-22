<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycSetting extends Model
{
    protected $fillable = [
        'id',
        'nid_verification',
        'passport_verification',
        'auto_approve',
        'status',
        'instructions',
    ];
}
