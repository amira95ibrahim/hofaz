<?php

namespace App\Http\Controllers;

use App\Models\SitePagesDetail;
use App\Models\Country;
use App\Models\Iftar;
use App\Models\Category;


class IftarfrontController extends BaseController
{

    public function index(){
        $countries = Country::active()->get();
        $categories = Category::active()->take(7)->get();

         $iftar=Iftar::get();
        return view('front.iftar', compact('countries','iftar','categories'));
    }
}
