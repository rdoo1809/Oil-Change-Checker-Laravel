<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehikl extends Model
{
    protected $fillable = [
        'current_odometer',
        'previous_odometer',
        'previous_oil_change_date',
    ];
}
