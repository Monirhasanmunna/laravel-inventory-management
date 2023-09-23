<?php

namespace Database\Seeders;

use App\Models\Vat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vats = [
            ['name' => 'VAT 0%', 'code' => 'VAT@0', 'rate' => '0', 'status' => 'active'],
            ['name' => 'VAT 5%', 'code' => 'VAT@5', 'rate' => '5', 'status' => 'active'],
            ['name' => 'VAT 10%', 'code' => 'VAT@10', 'rate' => '10', 'status' => 'active'],
        ];

        foreach ($vats as $key => $vat) {
            Vat::updateOrCreate([
                'name' => $vat['name'],
                'code' => $vat['code'],
                'rate' => $vat['rate'],
                'status' => $vat['status'],
            ]);
        }
    }
}
