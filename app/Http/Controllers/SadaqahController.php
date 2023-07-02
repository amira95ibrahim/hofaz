<?php

namespace App\Http\Controllers;

use App\Models\Sadaqah;
use App\Models\SitePagesDetail;

class SadaqahController extends BaseController
{

    public function index(){
        $sadaqat = Sadaqah::active()->get();

        $sadaqahPage = SitePagesDetail::SadaqahPage()->first();

        return view('front.sadaqa', compact('sadaqahPage', 'sadaqat'));
        
    }

}
