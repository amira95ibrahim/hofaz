<?php

namespace App\Http\Controllers;

use App\Models\SitePagesDetail;
use App\Models\Country;
use App\Models\Iftar;

class IftarfrontController extends BaseController
{

    public function index(){
        $countries = Country::active()->get();
         $iftar=Iftar::get();
        return view('front.iftar', compact('countries','iftar'));
    }
}
