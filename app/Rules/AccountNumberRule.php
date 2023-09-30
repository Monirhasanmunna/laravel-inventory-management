<?php

namespace App\Rules;

use App\Models\Account;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AccountNumberRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $type           = request('type');
        $account_number = request('account_number');

        //create new array with account numbers
        $accountNumbers = Account::orderBy('id','desc')->get()->map(function($item){
            return $item['account_number'];
        })->filter(function($item){
            // filter not null item
            return $item != null;
        })->toArray();


        //check logics
        if($type == 'bank' && !$account_number){
            $fail('The account number field is required.');
        }else if($type == 'bank' && in_array($account_number, $accountNumbers)){
            $fail('Account number already axist');
        }
    }
}
