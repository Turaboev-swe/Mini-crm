<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(2)->create();

        $leads = $users->flatMap(function ($user) {
            return Lead::factory(10)->for($user)->create();
        });

        Task::factory(15)->make()->each(function ($task) use ($leads) {
            $task->lead_id = $leads->random()->id;
            $task->save();
        });
    }
}
