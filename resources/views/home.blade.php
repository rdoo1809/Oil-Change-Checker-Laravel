<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oil Change Checker</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
<h1 style="font-size: 24px; margin-bottom: 20px;">Oil Change Checker</h1>

@if ($errors->any())
    <x-oil-change-form-errors :errors="$errors"/>
@endif

<form action="{{ route('vehikl.store') }}" method="POST">
    @csrf

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

</body>
</html>
