<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::create([
            'make' => 'Toyota',
            'model' => 'Tacoma',
            'year' => '2020',
        ]);

        Car::create([
            'make' => 'Honda',
            'model' => 'Civic',
            'year' => '1996',
        ]);
    }
}
