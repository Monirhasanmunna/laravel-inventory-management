<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class isSameAccount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $from_account = request('from_account_id');
        $to_account = request('to_account_id');

        if($from_account == $to_account){
            $fail('You can not transfer balance in the same account nummber');
        }
    }
}
