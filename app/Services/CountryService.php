<?php

namespace App\Services;

use App\Models\Country;


class CountryService
{
    public static function getActiveCountries(){
        return Country::active()->get();
    }
}
