<?php

namespace Tests\Feature;

use App\Models\Vehikl;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VehiklTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_rejects_invalid_data()
    {
        $response = $this->post('/check', [
            'current_odometer' => 9000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => '2030-01-01',
        ]);

        $response->assertSessionHasErrors([
            'previous_odometer',
            'previous_oil_change_date',
        ]);

        $this->assertDatabaseCount('vehikls', 0);
    }

    #[Test]
    public function it_creates_a_record_and_redirects_to_result()
    {
        $response = $this->post('/check', [
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => '2024-06-01',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('vehikls', [
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
        ]);
    }

    #[Test]
    public function is_due_logic_works_correctly()
    {
        $vehikl = Vehikl::create([
            'current_odometer' => 12000,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => Carbon::now()->subMonths(7)->toDateString(),
        ]);

        $this->assertTrue($vehikl->isDue());

        $vehikl2 = Vehikl::create([
            'current_odometer' => 10200,
            'previous_odometer' => 10000,
            'previous_oil_change_date' => Carbon::now()->subMonths(3)->toDateString(),
        ]);

        $this->assertFalse($vehikl2->isDue());
    }
}
