<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(VatSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(AccountsSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
