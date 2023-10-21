<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_product', 'purchase_id','product_id')
        ->withPivot(['quantity','price','subtotal']);
    }


    public function histories()
    {
        return $this->morphMany(TransactionHistory::class, 'source');
    }
}
