<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExpenseUpdateAmmountRule implements ValidationRule
{

    private $ammount;

    public function __construct($total_ammount)
    {
        $this->ammount = $total_ammount;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $total_paid = request('ammount');  
        // check is payment greater than availaleBalance?
        if($total_paid > $this->ammount){
            //error message set
            $fail("The amount should not more than availabe balance");
        }
    
    }
}
