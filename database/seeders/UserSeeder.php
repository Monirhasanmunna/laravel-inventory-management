<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name','Admin')->first();
        User::updateOrCreate([
            'name' => 'Munna',
            'email'=> 'monirhasanmunna1@gmail.com',
            'password' => bcrypt(11111111)
        ])->assignRole($role);
    }
}
