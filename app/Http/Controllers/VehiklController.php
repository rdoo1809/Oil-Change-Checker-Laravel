<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiklRequest;
use App\Models\Vehikl;
use Carbon\Carbon;

class VehiklController extends Controller
{
    public function index()
    {
        $vehikls = Vehikl::all();
        return view('history', compact('vehikls'));
    }

    public function store(VehiklRequest $request)
    {
        $vehikl = Vehikl::create($request->validated());
        return redirect()->route('vehikl.show', $vehikl);
    }

    public function show(Vehikl $vehikl)
    {
        $due = $vehikl->isDue();
        return view('show', [
            'vehikl' => $vehikl,
            'due' => $due,
            'message' => $due ? 'Oil change is due.' : 'Oil change is not due.',
        ]);
    }



//        return response()->json([
//            'id' => $vehikl->id,
//            'current_odometer' => $vehikl->current_odometer,
//            'previous_odometer' => $vehikl->previous_odometer,
//            'previous_oil_change_date' => $vehikl->previous_oil_change_date,
//            'due_for_oil_change' => $due,
//            'message' => $due ? 'Oil change is due.' : 'Oil change is not due.',
//        ]);
}
