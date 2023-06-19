<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LangController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param $lang
     * @return RedirectResponse
     */
    public function update($lang): RedirectResponse
    {
        App::setLocale($lang);
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
