<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\InviteKey;

class InviteKeyRule implements Rule
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
        $invitekey = InviteKey::where('token', $value)->first();

        if (!$invitekey) {
            return false;
        }

        if ($invitekey->uses < 1) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This invite key is invalid.';
    }
}
