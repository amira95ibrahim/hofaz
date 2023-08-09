<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Relief;
use App\Models\SitePagesDetail;
use Illuminate\Http\Request;
use App\Models\Category;


class ReliefController extends BaseController{

    public function index(Request $request){

        $reliefs = Relief::active();

        if(!empty($request->country))
            $reliefs = $reliefs->where('country_id', $request->country);

        $reliefs = $reliefs->get();

        $reliefsCountries = Country::whereHas('reliefs')->active()->get();
        $reliefsPageDetails = SitePagesDetail::reliefPage()->first();
        $categories = Category::active()->take(7)->get();

        return view('front.relief', compact('reliefs', 'reliefsPageDetails', 'reliefsCountries','categories'));
    }

    public function show(Relief $relief){

        if($relief->active){
            $categories = Category::active()->take(7)->get();

            return view('front.projectDetails')->with('project', $relief)->with('model', 'relief')->with('categories', $categories);
        }
        abort(404);
    }
}
