<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(5)->create();
        \App\Models\Thread::factory()->count(5)->create();
        \App\Models\Comment::factory()->count(10)->create();
    }
}
