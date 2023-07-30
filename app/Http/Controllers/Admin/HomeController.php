<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Donor;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $x=5;
        $Projects = Project::all();
        $Ended_Projects = Project::where('active',0)->get();
        // $Donations = Donation::all()->paginate(10);
        $Donations = DB::table('donations')->paginate(10);
        // $Donors = 6546;//Donor::all();
       // dd($x);
        return view('admin.home', compact('Projects','Ended_Projects' , 'Donations'));

    }
}
