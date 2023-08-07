<?php

namespace App\Http\Controllers;

use App\Models\kafarah;
use App\Models\SitePagesDetail;

class KafarahController extends BaseController
{

    public function index(){
        $Kafarah = Kafarah::active()->get();

        $kafarahPage = SitePagesDetail::KafarahPage()->first();

        return view('front.kafarah', compact('kafarahPage', 'Kafarah'));

    }

}
