<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Coordinator;
use App\Models\District;
use App\Models\Supporter;
use App\Models\Village;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        District::factory(9)->create();
        Village::factory(9)->create();
        Coordinator::factory(9)->create();
        Supporter::factory(9)->create();
    }
}
