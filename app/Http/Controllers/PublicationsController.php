<?php

namespace App\Http\Controllers;

use App\Models\Publication;

class PublicationsController extends BaseController{

    public function index(){
//return Publication::active()->get();
        return view('front.publications')->with('publications', Publication::active()->get());
    }
}
