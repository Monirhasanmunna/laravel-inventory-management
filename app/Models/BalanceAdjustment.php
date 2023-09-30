<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceAdjustment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function Account(){
        return $this->belongsTo(Account::class);
    }
}
