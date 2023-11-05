<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded= ['id'];

    public function category()
    {
        return $this->belongsTo(ExpCategory::class,'exp_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ExpSubCategory::class,'exp_sub_category_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function histories()
    {
        return $this->morphMany(TransactionHistory::class, 'source');
    }

}
