<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Relief;
use App\Models\Waqf;


class ProjectService
{

    public static function getActiveProjects(){
        return Project::active()->get();
    }

    public static function getAllActiveProjects(){
        $projects = Project::active()->get()->map(function($project) {
            $project->model = 'project';
            return $project;
        });
        $reliefs = Relief::active()->get()->map(function($relief) {
            $relief->model = 'relief';
            return $relief;
        });
        $waqf = Waqf::active()->get()->map(function($waqf) {
            $waqf->model = 'waqf';
            return $waqf;
        });

        return $projects->concat($reliefs)->concat($waqf);

    }

    public static function getHomepageProjects(){

        $projects = Project::active()->homepage()->get()->map(function($project) {
            $project->model = 'project';
            return $project;
        });
        $reliefs = Relief::active()->homepage()->get()->map(function($relief) {
            $relief->model = 'relief';
            return $relief;
        });
        $waqf = Waqf::active()->homepage()->get()->map(function($waqf) {
            $waqf->model = 'waqf';
            return $waqf;
        });

        return $projects->concat($reliefs)->concat($waqf);
    }
}
