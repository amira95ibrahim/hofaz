<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Kafala;
use App\Models\KafalaType;
use App\Models\Category;
use App\Models\SitePagesDetail;
use App\Models\Zakah;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder as ContractsBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KafalahController extends BaseController
{

    public function index(Request $request){
        $kafalat = Kafala::active();

        if(!empty($request->country))
            $kafalat = $kafalat->where('country_id', $request->country);

        if(!empty($request->gender))
            $kafalat = $kafalat->whereHas('kafalat' . $request->gender);

        $kafalat = $kafalat->get();

        $kafalahTypes = KafalaType::active()->whereHas('kafalat', function (Builder $query) use ($request) {
            if(!empty($request->country))
                $query->where('country_id', $request->country);

            if(!empty($request->gender))
                $query->whereHas('kafalat' . $request->gender);

        })->with(['kafalat' => function ($query) use ($request) {
            if(!empty($request->country))
                $query->where('country_id', $request->country);

            if(!empty($request->gender))
                $query->whereHas('kafalat' . $request->gender);
        }])->get();

        $kafalahPageDetails = SitePagesDetail::kafalahPage()->first();

        $kafalahCountries = Country::whereHas('kafalat')->active()->get();

        $categories = Category::active()->take(7)->get();


        return view('front.kafalat', compact('kafalat', 'kafalahTypes', 'kafalahCountries', 'kafalahPageDetails','categories'));
    }

    public function show(Kafala $kafala){
        $categories = Category::active()->take(7)->get();

        return view('front.sponsorDetail', compact('kafala','categories'));
    }
}
