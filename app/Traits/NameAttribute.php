<?php

namespace App\Traits;

trait NameAttribute
{

    public function getNameAttribute(){

        $name = 'name_' . app()->getLocale();
        return $this->$name;
    }

}
