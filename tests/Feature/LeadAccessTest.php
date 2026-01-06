<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadAccessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function user_cannot_view_another_users_lead(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $lead = Lead::factory()->create(['assigned_to' => $user1->id]);

        $response = $this->actingAs($user2)->get("/leads/{$lead->id}");

        $response->assertStatus(403); // unauthorized
    }
    public function lead_creation_requires_full_name_and_phone(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/leads', [
            'full_name' => '',
            'phone' => '',
            'status' => 'new',
        ]);

        $response->assertSessionHasErrors(['full_name', 'phone']);
    }
}
