<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Models\SitePagesDetail;
use Illuminate\Http\Request;

class ProjectController extends BaseController{

    public function index(Request $request){

        $projects = Project::active();

        if(!empty($request->country))
            $projects = $projects->where('country_id', $request->country);

        $projects = $projects->get();

        $projectsCountries = Country::whereHas('projects')->active()->get();
        $projectsPageDetails = SitePagesDetail::projectsPage()->first();
        return view('front.projects', compact('projects', 'projectsPageDetails', 'projectsCountries'));
    }

    public function show(Project $project){
        if($project->active){
            return view('front.projectDetails', compact('project'))->with('model', 'projects');
        }
        abort(404);
    }
}
