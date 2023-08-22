<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Coordinator;
use App\Models\District;
use App\Models\Supporter;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
        ]);


        $originalList = [
            'Bandarkedungmulyo',
            'Bareng',
            'Diwek',
            'Gudo',
            'Jogoroto',
            'Jombang',
            'Kabuh',
            'Kesamben',
            'Kudu',
            'Megaluh',
            'Mojoagung',
            'Mojowarno',
            'Ngoro',
            'Ngusikan',
            'Perak',
            'Peterongan',
            'Plandaan',
            'Ploso',
            'Sumobito',
            'Tembelang',
            'Wonosalam'
        ];

        $district = [];

        foreach ($originalList as $name) {
            $district[] = ['name' => $name];
        }

        District::factory()->createMany($district);


    }
}
