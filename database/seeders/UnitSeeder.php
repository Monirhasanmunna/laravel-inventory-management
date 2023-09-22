<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ["name" => "Pice", "code" => "Pc", "status" => "active"],
            ["name" => "Dozen", "code" => "Dz", "status" => "active"],
            ["name" => "Kilogram", "code" => "Kg", "status" => "active"],
        ];

        foreach ($units as $key => $unit) {
            Unit::updateOrCreate([
                'name'      => $unit['name'],
                'code'      => $unit['code'],
                'status'    => $unit['status']
            ]);
        }
    }
}
