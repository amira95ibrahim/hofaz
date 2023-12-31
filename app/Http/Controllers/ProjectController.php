<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Models\Category;

use App\Models\SitePagesDetail;
use Illuminate\Http\Request;

class ProjectController extends BaseController{

    public function index(Request $request){

        $projects = Project::active();

        if(!empty($request->country))
            $projects = $projects->where('country_id', $request->country);

        $projects = $projects->get();
        $categories = Category::active()->take(7)->get();

        $projectsCountries = Country::whereHas('projects')->active()->get();
        $projectsPageDetails = SitePagesDetail::projectsPage()->first();
        return view('front.projects', compact('projects', 'projectsPageDetails', 'projectsCountries','categories'));
    }

    public function show(Project $project){
        $categories = Category::active()->take(7)->get();

        if($project->active){
            return view('front.projectDetails', compact('project'))->with('model', 'projects')->with('categories', $categories);
        }
        abort(404);
    }


    public function projectCategory(Request $request, $catid)
{
    $projects = Project::active();

    if (!empty($request->country)) {
        $projects = $projects->where('country_id', $request->country);
    }

    // Add the condition to filter projects by category_id
    $projects = $projects->where('category_id', $catid);
    $categories = Category::active()->take(7)->get();

    $projects = $projects->get();

    $projectsCountries = Country::whereHas('projects')->active()->get();
    $projectsPageDetails = SitePagesDetail::projectsPage()->first();
    return view('front.projects', compact('projects', 'projectsPageDetails', 'projectsCountries','categories'));
}





}
