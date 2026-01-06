<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registry of Oil Changes</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

<h1 style="font-size: 24px; margin-bottom: 20px;">Registry of Oil Changes</h1>

<div>
    @foreach ($vehikls as $vehikl)
        <div style="border: #0a0a0a 1px solid">
            <p><strong>Vehikl ID:</strong> {{ $vehikl->id }}</p>
            <p><strong>Current Odometer:</strong> {{ $vehikl->current_odometer }}</p>
            <p><strong>Previous Odometer:</strong> {{ $vehikl->previous_odometer }}</p>
            <p><strong>Date of Previous Oil Change:</strong> {{ $vehikl->previous_oil_change_date }}</p>
            <p><strong>Is Due:</strong> {{ $vehikl->isDue() }}</p>
        </div>
    @endforeach
</div>

<a href="{{ url('/') }}" style="display: inline-block; margin-top: 20px; text-decoration: underline;">Check another
    car
</a>
</body>
</html>
