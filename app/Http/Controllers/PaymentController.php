<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentController extends BaseController {

    // public function index(Request $request){
    //     $sessions = session()->all();
    // //    dd($sessions);

    //     // Use the retrieved data to process the donation
    //     return view('front.payment');
    // }
    public function index(Request $request)
    {
        $request->validate([
            'country' => 'required', // Add validation rule for the 'country' field
            // You can add more validation rules for other fields if needed
        ]);

        $model = $request->query('model');
        $model_id = $request->query('model_id');
        $userId = $request->query('u');
        $country=$request->query('country');

        return view('front.payment', compact('model', 'model_id', 'userId','country'));
    }



    public function paymentfromcart(){
        return view('front.payment_cart');

    }

}
