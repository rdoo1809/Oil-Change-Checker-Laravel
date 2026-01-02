<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oil Change Checker</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
<h1 style="font-size: 24px; margin-bottom: 20px;">Oil Change Checker</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehikl.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 10px;">
        <label for="current_odometer">Current Odometer:</label><br>
        <input type="number" name="current_odometer" id="current_odometer" value="{{ old('current_odometer') }}" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label for="previous_odometer">Odometer at Previous Oil Change:</label><br>
        <input type="number" name="previous_odometer" id="previous_odometer" value="{{ old('previous_odometer') }}" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label for="previous_oil_change_date">Date of Previous Oil Change:</label><br>
        <input type="date" name="previous_oil_change_date" id="previous_oil_change_date" value="{{ old('previous_oil_change_date') }}" required>
    </div>

    <button type="submit" style="padding: 5px 10px;">Check</button>
</form>

</body>
</html>
