<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = District::query()->get();

        foreach ($districts as $districtItem) {
            $village = Http::get(sprintf('https://www.emsifa.com/api-wilayah-indonesia/api/villages/%s.json', $districtItem->id));
            foreach ($village->json() as $data) {
                $villages[] = [
                    'district_id'   => $data['district_id'],
                    'name'          => $data['name']
                ];
            }
        }

        Village::factory()->createMany($villages);
    }
}
