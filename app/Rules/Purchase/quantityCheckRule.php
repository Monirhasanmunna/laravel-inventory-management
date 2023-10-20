<?php

namespace App\Rules\Purchase;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class quantityCheckRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $quantityArray = request('quantity');
        
        foreach ($quantityArray as $key => $quantity) {
            if($quantity == null){
                $fail('Quantity field can not be null');
            }
        }
    }
}
