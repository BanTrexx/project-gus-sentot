<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $district = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/districts/3517.json');

        foreach ($district->json() as $districtItem) {
            $districts[] = [
                'id'   => $districtItem['id'],
                'name' => $districtItem['name']
            ];
        }

        District::factory()->createMany($districts);
    }
}
