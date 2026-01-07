<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Vehikl;
use App\Services\OilChangeService;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all()->where('user_id', auth()->id());
        $selectedCar = \request('car_id') ? Car::find(\request('car_id')) : null;
        $addNewCar = \request('add_new_car') ? true : false;
        return view('dashboard', compact('cars', 'selectedCar', 'addNewCar'));
    }

    public function store(Request $request)
    {
        $selectedCar = Car::create(array_merge(
            $request->only('make', 'model', 'year')
//            , ['user_id' => auth()->id()]
        ));
        return view('dashboard', compact('selectedCar'));
    }

    public function show(Car $car)
    {
        $vehikls = Vehikl::all()->where('car_id', $car->id);
        $oilChangeService = app(OilChangeService::class);
        return view('history', compact('vehikls', 'oilChangeService', 'car'));
    }
}
