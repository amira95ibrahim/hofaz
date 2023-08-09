<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\News;

class NewsController extends BaseController {

    public function index(){

        $news = News::active()->get();
        $categories = Category::active()->take(7)->get();

        return view('front.news', compact('news','categories'));
    }

    public function show(News $article){
        $categories = Category::active()->take(7)->get();


        return view('front.articleDetails', compact('article','categories'));
    }

}
