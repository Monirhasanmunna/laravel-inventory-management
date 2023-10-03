<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceTransfer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function fromAccount() {
        return $this->belongsTo(Account::class, 'from_account_id');
    }

    public function toAccount() {
        return $this->belongsTo(Account::class, 'to_account_id');
    }
}
