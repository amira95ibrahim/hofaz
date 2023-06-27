<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievement;
use App\Models\HomepageSlider;
use App\Models\News;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Relief;
use App\Models\Waqf;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController{

    public function index(){

        $publications = Publication::active()->homepage()->get();
        $news = News::active()->homepage()->limit(3)->get();
        // $achievements = Achievement::get();
        $sliders = HomepageSlider::active()->get();

        return view('front.index', compact('publications', 'news', 'achievements', 'sliders'));
    }
}
