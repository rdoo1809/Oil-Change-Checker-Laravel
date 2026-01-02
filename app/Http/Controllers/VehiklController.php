<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiklRequest;
use App\Models\Vehikl;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehiklController extends Controller
{
    public function store(VehiklRequest $request)
    {
        $vehikl = Vehikl::create($request->validated());
        return redirect()->route('vehikl.show', $vehikl);

//        return response()->json([
//            'id' => $vehikl->id,
//            'current_odometer' => $vehikl->current_odometer,
//            'previous_odometer' => $vehikl->previous_odometer,
//            'previous_oil_change_date' => $vehikl->previous_oil_change_date,
//            'due_for_oil_change' => $this->isDue($vehikl),
//            'message' => $this->isDue($vehikl) ? 'Oil change is due.' : 'Oil change is not due.',
//        ]);
    }

    public function show(Vehikl $vehikl)
    {
        $due = $this->isDue($vehikl);
        return view('show', [
            'vehikl' => $vehikl,
            'due' => $due,
            'message' => $due ? 'Oil change is due.' : 'Oil change is not due.',
        ]);

//        return response()->json([
//            'id' => $vehikl->id,
//            'current_odometer' => $vehikl->current_odometer,
//            'previous_odometer' => $vehikl->previous_odometer,
//            'previous_oil_change_date' => $vehikl->previous_oil_change_date,
//            'due_for_oil_change' => $due,
//            'message' => $due ? 'Oil change is due.' : 'Oil change is not due.',
//        ]);
    }

    protected function isDue(Vehikl $vehikl): bool
    {
        $distanceDue = ($vehikl->current_odometer - $vehikl->previous_odometer) > 5000;

        $dateDue = Carbon::parse($vehikl->previous_oil_change_date)
            ->addMonths(6)
            ->isPast();

        return $distanceDue || $dateDue;
    }
}
