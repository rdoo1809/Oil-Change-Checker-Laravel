<?php

namespace App\Http\Controllers;

use App\Models\Vehikl;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehiklController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'current_odometer' => ['required', 'integer', 'min:0'],
            'previous_odometer' => ['required', 'integer', 'min:0', 'lte:current_odometer'],
            'previous_oil_change_date' => ['required', 'date', 'before:today'],
        ]);

        $vehikl = Vehikl::create($validated);

        return response()->json([
            'id' => $vehikl->id,
            'current_odometer' => $vehikl->current_odometer,
            'previous_odometer' => $vehikl->previous_odometer,
            'previous_oil_change_date' => $vehikl->previous_oil_change_date,
            'due_for_oil_change' => $this->isDue($vehikl),
            'message' => $this->isDue($vehikl) ? 'Oil change is due.' : 'Oil change is not due.',
        ]);
    }

    public function show(Vehikl $vehikl)
    {
        $due = $this->isDue($vehikl);

        return response()->json([
            'id' => $vehikl->id,
            'current_odometer' => $vehikl->current_odometer,
            'previous_odometer' => $vehikl->previous_odometer,
            'previous_oil_change_date' => $vehikl->previous_oil_change_date,
            'due_for_oil_change' => $due,
            'message' => $due ? 'Oil change is due.' : 'Oil change is not due.',
        ]);
    }

    protected function isDue(Vehikl $vehikl): bool
    {
        $distanceDue = ($vehikl->current_odometer - $vehikl->previous_odometer) > 5000;

        $dateDue = Carbon::parse($vehikl->previous_oil_change_date)
            ->addMonths(6)
            ->isPast();

        return $distanceDue || $dateDue;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehikl $vehikl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehikl $vehikl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehikl $vehikl)
    {
        //
    }
}
