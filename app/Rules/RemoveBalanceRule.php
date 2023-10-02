<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RemoveBalanceRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // get request's by request
        $type = request('type');
        $ammount = request('ammount');
        $availableBalance = request('available_balance');

        // check is ammount greater than availaleBalance?
        if($type == 'removeBalance' && $ammount > $availableBalance){
            //error message set
            $fail("The amount should not more than availabe balance");
        }
    }
}
