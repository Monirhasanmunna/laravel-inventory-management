<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'SQUARE', 'code' => 'SQR', 'status' => 'active'],
            ['name' => 'NIKE', 'code' => 'NK', 'status' => 'active'],
            ['name' => 'OPPO', 'code' => 'OPPO', 'status' => 'active'],
        ];

        foreach ($brands as $key => $brand) {
            Brand::updateOrCreate([
                'name' => $brand['name'],
                'code' => $brand['code'],
                'status' => $brand['status'],
            ]);
        }
    }
}
