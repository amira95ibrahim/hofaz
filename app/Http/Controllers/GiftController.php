<?php

namespace App\Http\Controllers;

use App\Models\Gift;

class GiftController extends BaseController{

    public function index(){

        $gifts = Gift::active()->with('giftable')->get();

        return view('front.gift', compact('gifts'));
    }
}
