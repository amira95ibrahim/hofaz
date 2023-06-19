<?php

namespace App\Http\Controllers;

use App\Models\SitePagesDetail;
use App\Models\Zakah;

class ZakahController extends BaseController
{

    public function index(){
        $zakat = Zakah::active()->get();

        $zakahPage = SitePagesDetail::ZakahPage()->first();

        return view('front.zakah', compact('zakat', 'zakahPage'));
    }
}
