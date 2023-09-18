<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate([
            'name' => 'dashboard',
            'group_name' => 'dashboard'
        ]);

        $userManagementPermissions = ['user_management','user_management.permissions','user_management.roles','user_management.users'];

        foreach ($userManagementPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'user_management'
            ]);
        }

        $expenssesPermissions = ['expenses','expenses.categories','expenses.sub_categories','expenses.list'];

        foreach ($expenssesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'expenses'
            ]);
        }


        $purchasesPermissions = ['purchase','purchase.list','purchase.return.list'];

        foreach ($purchasesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'purchase'
            ]);
        }


        $salesPermissions = ['sales','sales.quatations.list','sales.invoices.list','sales.return.list'];

        foreach ($salesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'sales'
            ]);
        }


        $productPermissions = ['products','product.categories','product.sub.categories','product.list','product.barcode'];

        foreach ($productPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'products'
            ]);
        }

        $InventoryPermissions = ['inventory','inventory.view_inventory','inventory.adjustment'];

        foreach ($InventoryPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'inventory'
            ]);
        }
    }
}
