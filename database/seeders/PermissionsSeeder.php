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

        $userManagementPermissions = ['permissions','roles','users'];

        foreach ($userManagementPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'user_management'
            ]);
        }

        $expenssesPermissions = ['expense_categories','expense_sub_categories','expenses_list'];

        foreach ($expenssesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'expenses'
            ]);
        }


        $purchasesPermissions = ['purchase_list','purchase_return_list'];

        foreach ($purchasesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'purchase'
            ]);
        }


        $salesPermissions = ['quatations_list','invoices_list','sales_return_list'];

        foreach ($salesPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'sales'
            ]);
        }


        $productPermissions = ['product_categories','product_sub_categories','product_list','barcode'];

        foreach ($productPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'products'
            ]);
        }

        $InventoryPermissions = ['view_inventory','inventory_adjustment'];

        foreach ($InventoryPermissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'group_name' => 'inventory'
            ]);
        }
    }
}
