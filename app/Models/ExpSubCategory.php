<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['exp_category_id','name','note','status'];

    public function category()
    {
        return $this->belongsTo(ExpCategory::class,'exp_category_id');
    }
}
