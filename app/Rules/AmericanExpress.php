<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AmericanExpress implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace(' ', '', $value);
        if(preg_match('/^3[47][0-9]{13}$/', $value, $matches)){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Numer karty AmericanExpress jest niepoprawny.';
    }
}
