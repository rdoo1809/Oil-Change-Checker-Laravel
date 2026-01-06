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
        return view('home', compact('cars', 'selectedCar', 'addNewCar'));
    }


    public function store(Request $request)
    {
        $selectedCar = Car::create($request->only('make', 'model', 'year'));
        return view('home', compact('selectedCar'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }
}
