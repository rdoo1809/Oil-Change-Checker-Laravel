<?php

namespace Tests\Feature;

use App\Models\Vehikl;
use App\Services\OilChangeService;
use Carbon\Carbon;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehiklTest extends TestCase
{
    use RefreshDatabase;

    protected $car;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->car = Car::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);
    }

    #[Test]
    public function it_rejects_invalid_data()
    {
        $response = $this->from('/')->post('/check', [
            'current_odometer' => 9000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => now()->addYear()->format('Y-m-d'),
            'car_id' => 5,
        ]);

        $response->assertRedirect('/');

        $response->assertSessionHasErrors([
            'previous_odometer',
            'previous_oil_change_date',
            'car_id',
        ]);

        $this->assertDatabaseCount('vehikls', 0);
    }

    #[Test]
    public function it_creates_a_record_and_redirects_to_result()
    {
        $response = $this->post('/check', [
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => now()->subMonth()->format('Y-m-d'),
            'car_id' => $this->car->id,
        ]);

        $vehikl = Vehikl::first();
        $response->assertRedirect(route('vehikl.show', $vehikl));

        $this->assertDatabaseHas('vehikls', [
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
            'car_id' => $this->car->id,
        ]);
    }

    #[Test]
    public function is_due_logic_works_correctly()
    {
        $oilChangeService = app(OilChangeService::class);

        $vehikl = Vehikl::create([
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => Carbon::now()->subMonths(7)->toDateString(),
            'car_id' => $this->car->id,
        ]);

        $this->assertTrue($oilChangeService->isDue($vehikl));

        $vehikl2 = Vehikl::create([
            'current_odometer' => 10200,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => Carbon::now()->subMonths(3)->toDateString(),
            'car_id' => $this->car->id,
        ]);

        $this->assertFalse($oilChangeService->isDue($vehikl2));
    }
}
