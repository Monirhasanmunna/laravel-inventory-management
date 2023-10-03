<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Balances(){
        return $this->hasMany(BalanceAdjustment::class);
    }

    public function tranferForm(){
        return $this->hasMany(BalanceTransfer:: class, 'from_account_id');
    }

    public function tranferTo(){
        return $this->hasMany(BalanceTransfer:: class, 'to_account_id');
    }

    
}
