<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oil Change Result</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

<h1 style="font-size: 24px; margin-bottom: 20px;">Oil Change Result</h1>

<p><strong>Current Odometer:</strong> {{ $vehikl->current_odometer }}</p>
<p><strong>Previous Odometer:</strong> {{ $vehikl->previous_odometer }}</p>
<p><strong>Date of Previous Oil Change:</strong> {{ $vehikl->previous_oil_change_date }}</p>

<h2 style="margin-top: 20px; font-weight: bold; color: green">
    {{ $message }}
</h2>

<a href="{{ url('/dashboard') }}" style="display: inline-block; margin-top: 20px; text-decoration: underline;">Check another car</a>

</body>
</html>
