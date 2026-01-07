<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadValidationTest extends TestCase
{
    use RefreshDatabase;
    public function test_lead_cannot_be_created_without_required_fields(): void
    {
        $user = User::factory()->create();
        $this->withMiddleware();
        $response = $this->actingAs($user)->post('/leads', [
            'full_name' => '',
            'phone' => '',
        ]);

        $response->assertSessionHasErrors(['full_name', 'phone']);
    }
}
