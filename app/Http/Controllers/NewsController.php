<?php

namespace App\Http\Controllers;


use App\Models\News;

class NewsController extends BaseController {

    public function index(){

        $news = News::active()->get();
        return view('front.news', compact('news'));
    }

    public function show(News $article){

        return view('front.articleDetails', compact('article'));
    }

}
