<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $selectedCar = \request('car_id') ? Car::find(\request('car_id')) : null;
        $addNewCar = \request('add_new_car') ? true : false;
        return view('dashboard', compact('cars', 'selectedCar', 'addNewCar'));
    }


    public function store(Request $request)
    {
        $selectedCar = Car::create(array_merge(
            $request->only('make', 'model', 'year'),
            ['user_id' => auth()->id()]
        ));
        return view('dashboard', compact('selectedCar'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }
}
