<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Waqf;
use App\Models\SitePagesDetail;
use Illuminate\Http\Request;

class WaqfController extends BaseController{

    public function index(Request $request){

        $waqf = Waqf::active();

        if(!empty($request->country))
            $waqf = $waqf->where('country_id', $request->country);

        $waqf = $waqf->get();

        $waqfCountries = Country::whereHas('waqf')->active()->get();
        $waqfPageDetails = SitePagesDetail::waqfPage()->first();
        return view('front.waqf', compact('waqf', 'waqfPageDetails', 'waqfCountries'));
    }

    public function show(Waqf $waqf){
        if($waqf->active){
            return view('front.projectDetails')->with('project', $waqf)->with('model', 'waqf');
        }
        abort(404);
    }
}
