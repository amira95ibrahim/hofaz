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
    // Retrieve the model, model_id, and userId from the query parameters
    $model = $request->query('model');
    $model_id = $request->query('model_id');
    $userId = $request->query('u');
    return view('front.payment',compact('model','model_id','userId'));
}


    public function paymentfromcart(){
        return view('front.payment_cart');

    }

}
