<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Setting;

class MetaDataLength implements Rule
{
    public function passes($attribute, $value)
    {
        // Fetch the character limits from the settings table
        $metaTitleMinLength = Setting::where('name', 'meta_title_min_length')->first()->value;
        $metaTitleMaxLength = Setting::where('name', 'meta_title_max_length')->first()->value;
        $metaDescMinLength = Setting::where('name', 'meta_description_min_length')->first()->value;
        $metaDescMaxLength = Setting::where('name', 'meta_description_max_length')->first()->value;

        // Perform validation based on the fetched character limits
        if ($attribute === 'meta-title') {
            return strlen($value) >= $metaTitleMinLength && strlen($value) <= $metaTitleMaxLength + 30;
        }

        if ($attribute === 'meta-description') {
            return strlen($value) >= $metaDescMinLength && strlen($value) <= $metaDescMaxLength + 50;
        }

        return false; // Attribute name is not recognized
    }

    public function message()
    {
        return 'The :attribute must be between the minimum and maximum character limits.';
    }
}
