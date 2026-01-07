<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oil Change Checker</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
<h1 style="font-size: 24px; margin-bottom: 20px;">Oil Change Checker</h1>

@if(!$selectedCar)
    <h4>Select a Car to get started or <a href="{{route('cars.index', ['add_new_car' => 1])}}">Add a New Car</a></h4>

    @if($addNewCar)
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf

            <x-oil-change-form-input form-field="make" label-text="Car Make" input-type="text"
                                     :input-value-old="$car->make ?? null"
            />

            <x-oil-change-form-input form-field="model" label-text="Car Model" input-type="text"
                                     :input-value-old="$car->model ?? null"
            />

            <x-oil-change-form-input form-field="year" label-text="Car Year" input-type="number"
                                     :input-value-old="$car->year ?? null"
            />

            <button type="submit" style="padding: 5px 10px;">Add Car</button>
        </form>
    @else
        <form action="{{route('cars.index')}}" method="GET">
            <select name="car_id" onchange="this.form.submit()">
                <option value="0">--Make A Selection--</option>
                @foreach ($cars as $car)
                    <option value="{{$car->id}} {{ request('car_id') === $car->id ? 'selected' : '' }}">
                        {{ "$car->make $car->model $car->year"  }}
                    </option>
                @endforeach
            </select>
        </form>
    @endif

@elseif($selectedCar)
    <h4>{{"$selectedCar->make $selectedCar->model"}} <a href="{{route('cars.index')}}">deselect car</a> -
        <a href="{{route('cars.show')}}">view car history</a></h4>

    @if ($errors->any())
        <x-oil-change-form-errors :errors="$errors"/>
    @endif

    <form action="{{ route('vehikl.store') }}" method="POST">
        @csrf
        <input type="hidden" name="car_id" value="{{$selectedCar->id}}"/>

        <x-oil-change-form-input form-field="current_odometer" label-text="Current Odometer" input-type="number"
                                 :input-value-old="$vehikl->previous_odometer ?? null"
        />

        <x-oil-change-form-input form-field="previous_odometer" label-text="Odometer at Previous Oil Change"
                                 input-type="number"
                                 :input-value-old="$vehikl->previous_odometer ?? null"
        />

        <x-oil-change-form-input form-field="previous_oil_change_date" label-text="Date of Previous Oil Change"
                                 input-type="date"
                                 :input-value-old="$vehikl->previous_oil_change_date ?? null"
        />

        <button type="submit" style="padding: 5px 10px;">Check</button>
    </form>
@endif


</body>
</html>
