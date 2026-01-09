<?php

namespace Feature;

use App\Models\Vehikl;
use App\Services\OilChangeService;
use Carbon\Carbon;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    #[Test]
    public function it_creates_a_car_record()
    {
        $response = $this->post('/add-car', [
            'make' => 'Nissan',
            'model' => 'Altima',
            'year' => 2009,
            'user_id' => $this->user->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('cars', [
            'make' => 'Nissan',
            'model' => 'Altima',
            'year' => 2009,
        ]);
    }

    #[Test]
    public function it_shows_only_cars_for_authenticated_user()
    {
        // Create cars for this user
        $userCar1 = Car::factory()->create(['user_id' => $this->user->id]);
        $userCar2 = Car::factory()->create(['user_id' => $this->user->id]);

        // Create cars for another user
        $otherUser = User::factory()->create();
        $otherCar = Car::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->get('/dashboard');

        $response->assertStatus(200)
            ->assertViewIs('dashboard')
            ->assertViewHas('cars', function ($cars) use ($userCar1, $userCar2, $otherCar) {
                // The cars collection should contain only this user's cars
                return $cars->contains($userCar1)
                    && $cars->contains($userCar2)
                    && !$cars->contains($otherCar);
            });
    }

    #[Test]
    public function it_sets_selected_car_when_car_id_is_provided()
    {
        $selectedCar = Car::factory()->create(['user_id' => $this->user->id]);
        $response = $this->get('/dashboard?car_id=' . $selectedCar->id);

        $response->assertStatus(200)
            ->assertViewHas('selectedCar', $selectedCar);
    }

    #[Test]
    public function it_sets_add_new_car_flag()
    {
        $response = $this->get('/dashboard?add_new_car=1');

        $response->assertStatus(200)
            ->assertViewHas('addNewCar', true);
    }
}
