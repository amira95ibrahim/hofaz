<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Category;
use App\Models\HomepageSlider;
use App\Models\News;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Relief;
use App\Models\Waqf;

class HomeController extends BaseController{

    public function index(){

        $publications = Publication::active()->homepage()->get();
        $news = News::active()->homepage()->limit(3)->get();
        $achievements = Achievement::get();
        $sliders = HomepageSlider::active()->get();
        // $categories=Category::active()->get();
        $categories = Category::active()->take(7)->get();
        return view('front.index', compact('publications', 'news', 'achievements', 'sliders','categories'));
    }
}
