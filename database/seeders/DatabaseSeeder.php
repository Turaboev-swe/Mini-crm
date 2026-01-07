<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect([
            User::create([
                'name' => 'User One',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
            ]),
            User::create([
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
            ]),
        ]);


        $leads = $users->flatMap(function ($user) {
            return Lead::factory(10)->for($user)->create();
        });


        Task::factory(15)->make()->each(function ($task) use ($leads) {
            $task->lead_id = $leads->random()->id;
            $task->save();
        });
    }
}
