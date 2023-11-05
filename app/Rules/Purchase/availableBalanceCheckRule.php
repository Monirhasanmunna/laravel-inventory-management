<?php

namespace App\Rules\Purchase;

use App\Models\Account;
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
        if(request('account_id')){
            $total_paid = '';
            
            if(request('total_paid')){
              $total_paid = request('total_paid');  
            }

            if(request('ammount')){
                $total_paid = request('ammount');  
            }
            
            
            $account_id = request('account_id');
            $account = Account::find($account_id);
            $availableBalance = $account->total_ammount;

        // check is payment greater than availaleBalance?
            if($total_paid > $availableBalance){
                //error message set
                $fail("The amount should not more than availabe balance");
            }
        }
    }
}
