<?php

namespace App\Http\Controllers;


use App\Models\Testimonial;

class DonationController extends BaseController{

    public function index(){

        $testimonial = Testimonial::active()->get();

        return view('front.donation', compact('testimonial'));

    }

}
