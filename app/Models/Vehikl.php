<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehikl extends Model
{
    protected $fillable = [
        'current_odometer',
        'previous_odometer',
        'previous_oil_change_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
