<?php

namespace App\Http\Controllers;

use App\Models\Sadaqah;
use App\Models\Category;

use App\Models\SitePagesDetail;

class SadaqahController extends BaseController
{

    public function index(){
        $sadaqat = Sadaqah::active()->get();

        $sadaqahPage = SitePagesDetail::SadaqahPage()->first();
        $categories = Category::active()->take(7)->get();

        return view('front.sadaqa', compact('sadaqahPage', 'sadaqat','categories'));

    }

}
