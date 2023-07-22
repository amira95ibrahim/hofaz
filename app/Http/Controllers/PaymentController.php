<?php

namespace App\Http\Controllers;


class PaymentController extends BaseController {

    public function index(){


        // Use the retrieved data to process the donation
        return view('front.payment');
    }
    public function paymentfromcart(){
        return view('front.payment_cart');

    }

}
