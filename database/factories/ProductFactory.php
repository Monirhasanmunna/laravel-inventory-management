<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'sub_category_id'   => Category::orderBy('id','DESC')->first(),
            // 'brand_id'          => Brand::orderBy('id','DESC')->first(),
            // 'unit_id'           => Unit::orderBy('id','DESC')->first(),
            // 'vat_rate'  => 5,
            // 'vat_type'  => 'inclusive',
            // 'name'  => fake()->name,
            // 'model'  => fake()->model,
            // 'item_code'  => fake()->item_code,
            // 'regular_price'  => fake()->regular_price,
            // 'discount'  => fake()->discount,
            // 'selling_price'  => fake()->selling_price,
            // 'note'  => fake()->note,
            // 'alert_quantity'  => fake()->alert_quantity,
        ];
    }
}
