<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehikl extends Model
{
    protected $fillable = [
        'current_odometer',
        'previous_odometer',
        'previous_oil_change_date',
        'car_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
