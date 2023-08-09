<?php

namespace App\Http\Controllers;

use App\Models\kafarah;
use App\Models\SitePagesDetail;
use App\Models\Category;

class KafarahController extends BaseController
{

    public function index(){
        $Kafarah = Kafarah::active()->get();
        $categories = Category::active()->take(7)->get();

        $kafarahPage = SitePagesDetail::KafarahPage()->first();

        return view('front.kafarah', compact('kafarahPage', 'Kafarah','categories'));

    }

}
