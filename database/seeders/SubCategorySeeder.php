<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $category = Category::orderBy('id','DESC')->first();
       
       if(isset($category)){
        SubCategory::updateOrCreate([
            'category_id' => $category->id,
            'name'        => 'Bat',
            'status'      => 'active'
        ]);

        SubCategory::updateOrCreate([
            'category_id' => $category->id,
            'name'        => 'Ball',
            'status'      => 'active'
        ]);
       }

    }
}
