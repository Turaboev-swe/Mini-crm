<?php

namespace Database\Factories;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lead::class;
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'phone' => '+9989' . $this->faker->numerify('#######'),
            'status' => $this->faker->randomElement(['new','in_progress','done']),
            'note' => $this->faker->optional()->sentence(10),
        ];
    }
}
