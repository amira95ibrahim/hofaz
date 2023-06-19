<?php

namespace App\Http\Controllers;


use App\Models\Kafala;
use App\Models\News;
use App\Models\Project;
use App\Models\Relief;
use App\Models\Waqf;

class SearchController extends BaseController {

    public function index($query){
        $query = $this->preparedQuery($query);

        $query_word = substr_replace($query, '+', 0, 0);
        $query_words = str_replace(" "," +","$query_word");

        $projects = Project::active()
            ->where(function($q) use ($query_words) {
                $q->whereRaw("MATCH(name_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(name_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)");
            })->get();

        $waqf = Waqf::active()
            ->where(function($q) use ($query_words) {
                $q->whereRaw("MATCH(name_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(name_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)");
            })->get();

        $reliefs = Relief::active()
            ->where(function($q) use ($query_words) {
                $q->whereRaw("MATCH(name_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(name_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)");
            })->get();

        $kafala = Kafala::active()
            ->where(function($q) use ($query_words) {
                $q->whereRaw("MATCH(name_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(name_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)");
            })->get();

        $news = News::active()
            ->where(function($q) use ($query_words) {
                $q->whereRaw("MATCH(name_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(name_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_en) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(description_ar) AGAINST('\"$query_words\"' IN NATURAL LANGUAGE MODE)");
            })->get();

        return view('front.search', compact('projects', 'waqf', 'reliefs', 'kafala', 'news'))->render();
    }

    protected function preparedQuery($query){
        $query_ = str_replace('-',' ',$query);
        $query = htmlspecialchars(trim(urldecode($query_)));
        return $query;
    }

}
