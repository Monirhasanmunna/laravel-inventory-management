<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Admin','Counter','Accountent'];

        foreach ($roles as $key => $role) {
            Role::updateOrCreate([
                'name' => $role
            ]);
        }

        $permissions = Permission::all();
        $admin = Role::where('name','Admin')->first();
        $admin->syncPermissions($permissions);
    }
}
