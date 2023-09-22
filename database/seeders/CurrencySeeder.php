<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['name' => 'Bangladesh taka','code' => 'BDT', 'symbol' => 'ট','status' => 'active'],
            ['name' => 'Indian Rupee','code' => 'INR', 'symbol' => '₹','status' => 'active'],
            ['name' => 'US Dollar','code' => 'USS', 'symbol' => '$','status' => 'active'],
        ];

        foreach ($currencies as $key => $currency) {
            Currency::updateOrCreate([
                'name' => $currency['name'],
                'code' => $currency['code'],
                'symbol' => $currency['symbol'],
                'status' => $currency['status'],
            ]); 
        }
    }
}
