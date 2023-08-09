<?php

namespace App\Http\Controllers;


use App\Models\Testimonial;
use App\Models\Category;



class DonationController extends BaseController{

    public function index(){

        $testimonial = Testimonial::active()->get();
        $categories = Category::active()->take(7)->get();

        return view('front.donation', compact('testimonial','categories'));

    }

}
