<?php

namespace Database\Seeders;

use App\Models\Letter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        $users->each(function ($user) {
            Letter::factory()->count(random_int(1, 5))->create(['user_id' => $user->id]);
        });
    }
}
