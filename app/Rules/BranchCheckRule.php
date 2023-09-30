<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BranchCheckRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // get request's by request
        $type           = request('type');
        $branch_name    = request('branch_name');

        if($type == 'bank' && !$branch_name){
            $fail('The branch name field is required.');
        }
    }
}
