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

        return view('front.elkher.index' , compact('kfalatys','tabratys','wakfyats','mashroatys'));

    }

    public function elkher_kafalat (){

         return view('front.elkher.kafalat' );
        //  return view('front.elkher.kafalat' , compact('kfalatys'));
    }

    public function elkher_tabraat (){

        // return view('front.elkher.tabraat' , compact('tabratys'));
        return view('front.elkher.tabraat' );
    }

    public function elkher_masert (){

        // return view('front.elkher.masert_elkher' , compact('maserts'));
        return view('front.elkher.masert_elkher');
    }

    public function elkher_arshef (){

        // return view('front.elkher.arshef_takarer' , compact('takarers'));
        return view('front.elkher.arshef_takarer');
    }

    public function elkher_wakfyat(){

        // return view('front.elkher.wakfyat' , compact('wakfyats'));
        return view('front.elkher.wakfyat' );
    }
    public function elkher_mashroat (){

        //  return view('front.elkher.mashroat' , compact('mashroats'));
        return view('front.elkher.mashroat' );
    }
}
