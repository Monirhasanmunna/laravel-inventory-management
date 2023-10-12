<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            ['name' => 'Ali Hossain','email'=>'ali@gmail.com','company_name'=>'Ali Hossain Ltd','contact_number'=>'01745124571'],
            ['name' => 'Abdur Rahim','email'=>'abdurrahim@gmail.com','company_name'=>'Abdur Rahim Ltd','contact_number'=>'01745145771'],
            ['name' => 'Sakib Hossain','email'=>'sakib@gmail.com','company_name'=>'Mobile Jamuna Ltd','contact_number'=>'01745784571'],
            ['name' => 'Rayhan Kabir','email'=>'rayhan@gmail.com','company_name'=>'Rayhan Ltd','contact_number'=>'017124124571'],
        ];

        foreach ($suppliers as $key => $supplier) {
            Supplier::updateOrCreate([
                'name' => $supplier['name'],
                'email' => $supplier['email'],
                'company_name' => $supplier['company_name'],
                'contact_number' => $supplier['contact_number'],
            ]);
        }
    }
}
