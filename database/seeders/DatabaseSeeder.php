<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Coordinator;
use App\Models\District;
use App\Models\Supporter;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

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

//        $originalList = [
//            'Bandarkedungmulyo',
//            'Bareng',
//            'Diwek',
//            'Gudo',
//            'Jogoroto',
//            'Jombang',
//            'Kabuh',
//            'Kesamben',
//            'Kudu',
//            'Megaluh',
//            'Mojoagung',
//            'Mojowarno',
//            'Ngoro',
//            'Ngusikan',
//            'Perak',
//            'Peterongan',
//            'Plandaan',
//            'Ploso',
//            'Sumobito',
//            'Tembelang',
//            'Wonosalam'
//        ];
//
//        $district = [];
//

        $this->call([
            DistrictSeeder::class,
            VillageSeeder::class,
            CoordinatorSeeder::class,
        ]);

    }
}
