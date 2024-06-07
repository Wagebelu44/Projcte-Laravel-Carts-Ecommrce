<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Auth;
// use App\Rules\Auth;

class MatchOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     */
    public function passes(string $attribute, $value): bool
    {
        return Hash::check($value, Auth::guard('cliants')->user()->password);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The validation error message.';
    }
}
