<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::updateOrCreate([
            'bank_name' => 'DBBL',
            'branch_name' => 'Bogra',
            'account_number' => '1002545785421'
        ]);
    }
}
