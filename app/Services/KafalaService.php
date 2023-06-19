<?php

namespace App\Services;

use App\Models\KafalaField;
use App\Models\KafalaType;


class KafalaService
{
    public static function getActiveKafalaFields(){
        return KafalaField::active()->get();
    }

    public static function getActiveKafalaTypes(){
        return KafalaType::active()->get();
    }
}
