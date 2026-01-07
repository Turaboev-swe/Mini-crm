<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_cannot_be_created_without_title()
    {
        $user = User::factory()->create();
        $lead = Lead::factory()->create(['assigned_to' => $user->id]);

        $response = $this->actingAs($user)->post(route('tasks.store', $lead), [
            'title' => '',
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_only_owner_can_add_task_to_lead()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $lead = Lead::factory()->create(['assigned_to' => $otherUser->id]);

        $response = $this->actingAs($user)->post(route('tasks.store', $lead), [
            'title' => 'New Task',
        ]);

        $response->assertForbidden();
    }
}
