<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidGender implements Rule
{
    public function passes($attribute, $value)
    {
        $accessible_genders = config('user.gender_types');
        return array_key_exists($value, $accessible_genders);
    }

    public function message()
    {
        return __("validation.gender");
    }
}
