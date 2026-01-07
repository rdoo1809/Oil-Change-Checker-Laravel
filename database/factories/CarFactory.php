<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'make' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->year(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
