<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Category;
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

        $categories = Category::active()->take(7)->get();


        return view('front.elkher.index' , compact('kfalatys','tabratys','wakfyats','mashroatys','categories'));

    }

    public function elkher_kafalat (){
        $categories = Category::active()->take(7)->get();

         return view('front.elkher.kafalat',compact('categories') );
        //  return view('front.elkher.kafalat' , compact('kfalatys'));
    }

    public function elkher_tabraat (){
        $categories = Category::active()->take(7)->get();

        // return view('front.elkher.tabraat' , compact('tabratys'));
        return view('front.elkher.tabraat',compact('categories') );
    }

    public function elkher_masert (){
        $categories = Category::active()->take(7)->get();

        // return view('front.elkher.masert_elkher' , compact('maserts'));
        return view('front.elkher.masert_elkher',compact('categories'));
    }

    public function elkher_arshef (){
        $categories = Category::active()->take(7)->get();

        // return view('front.elkher.arshef_takarer' , compact('takarers'));
        return view('front.elkher.arshef_takarer',compact('categories'));
    }

    public function elkher_wakfyat(){
        $categories = Category::active()->take(7)->get();

        // return view('front.elkher.wakfyat' , compact('wakfyats'));
        return view('front.elkher.wakfyat',compact('categories') );
    }
    public function elkher_mashroat (){
        $categories = Category::active()->take(7)->get();

        //  return view('front.elkher.mashroat' , compact('mashroats'));
        return view('front.elkher.mashroat',compact('categories') );
    }
}
