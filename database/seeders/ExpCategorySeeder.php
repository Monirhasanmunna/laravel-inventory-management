<?php

namespace Database\Seeders;

use App\Models\ExpCategory;
use App\Models\ExpSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = ExpCategory::updateOrCreate([
            'name'  => 'Utilities',
            'status'=> 'active',
        ]);

        ExpSubCategory::updateOrCreate([
            'exp_category_id'   => $category->id,
            'name'              => 'Electricity Bill',
            'status'            => 'active',
        ]);

        ExpSubCategory::updateOrCreate([
            'exp_category_id'   => $category->id,
            'name'              => 'Gass Bill',
            'status'            => 'active',
        ]);

        ExpSubCategory::updateOrCreate([
            'exp_category_id'   => $category->id,
            'name'              => 'Washa Bill',
            'status'            => 'active',
        ]);
    }
}
