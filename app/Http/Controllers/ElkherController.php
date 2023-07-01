<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElkherController extends Controller
{
    public function index(){

        $kfalatys = Donation::where('donor_id', Auth::id())
        ->where('model_id', 1)
        ->sum('amount');

        $tabratys = Donation::where('donor_id', Auth::id())
        ->where('model_id', 2)
        ->sum('amount');


        $wakfyats = Donation::where('donor_id', Auth::id())
        ->where('model_id', 3)
        ->sum('amount');


        $mashroatys = Donation::where('donor_id', Auth::id())
        ->where('model_id', 4)
        ->sum('amount');

        return view('front.elkher' , compact('kfalatys','tabratys','wakfyats','mashroatys'));

    }
}
