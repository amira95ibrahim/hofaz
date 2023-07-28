<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentController extends BaseController {

    public function index(Request $request){
        $sessions = session()->all();
      // dd($sessions);

        // Use the retrieved data to process the donation
        return view('front.payment');
    }

    public function paymentfromcart(){
        return view('front.payment_cart');

    }

}
