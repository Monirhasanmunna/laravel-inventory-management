<?php

namespace Database\Seeders;

use App\Models\ExpCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpCategory::updateOrCreate([
            'name'  => 'utilities',
            'status'=> 'active',
        ]);
    }
}
