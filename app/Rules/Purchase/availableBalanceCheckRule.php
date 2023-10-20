<?php

namespace App\Rules\Purchase;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class availableBalanceCheckRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // get request's by request
        $total_paid = request('total_paid');
        $availableBalance = request('available_balance');

        // check is payment greater than availaleBalance?
        if($total_paid > $availableBalance){
            //error message set
            $fail("The amount should not more than availabe balance");
        }
    }
}
