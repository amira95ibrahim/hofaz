<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Category;

class PublicationsController extends BaseController{

    public function index(){
    //return Publication::active()->get();
    $categories = Category::active()->take(7)->get();

        return view('front.publications')->with('publications', Publication::active()->get())->with('categories',$categories);
    }
}
