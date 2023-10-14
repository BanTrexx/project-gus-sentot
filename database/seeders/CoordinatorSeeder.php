<?php

namespace Database\Seeders;

use App\Models\Coordinator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coordinator::create([
            'village_id' => 1,
            'name' => 'Sukadi',
        ]);
    }
}
