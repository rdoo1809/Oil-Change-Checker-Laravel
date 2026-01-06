<?php

namespace App\Services;

use App\Models\Vehikl;
use Carbon\Carbon;

class OilChangeService
{
    public function isDue(Vehikl $vehikl): bool
    {
        $distanceDue = ($vehikl->current_odometer - $vehikl->previous_odometer) > 5000;
        $dateDue = Carbon::parse($vehikl->previous_oil_change_date)->addMonths(6)->isPast();

        return $distanceDue || $dateDue;
    }

}
