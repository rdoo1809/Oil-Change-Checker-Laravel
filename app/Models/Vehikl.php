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

    public function isDue(): bool
    {
        $distanceDue = ($this->current_odometer - $this->previous_odometer) > 5000;
        $dateDue = Carbon::parse($this->previous_oil_change_date)->addMonths(6)->isPast();

        return $distanceDue || $dateDue;
    }
}
