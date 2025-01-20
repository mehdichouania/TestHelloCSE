<?php

namespace App\Models;

use App\Enums\ProfileStatus;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $casts = [
        'status' => ProfileStatus::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'status',
    ];
}