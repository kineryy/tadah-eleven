<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AssetTypesRule implements Rule
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
        if ($value == "Shirt" || $value == "Pants" || $value == "Image" || $value == "T-Shirt" || $value == "Face") {
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
        return 'Please select a valid asset type.';
    }
}
