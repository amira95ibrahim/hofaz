<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProjectDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Project;
use App\Models\SitePagesDetail;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Response;

class ProjectController extends AppBaseController
{
    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     *
     * @return Response
     */
    public function index(ProjectDataTable $projectDataTable)
    {
        return $projectDataTable->render('admin.projects.index');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        foreach ($request->country_id as $country){
            $image = $request->file('image');
            $path = 'projects/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            Project::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'cost' => $request->cost,
                'paid' => $request->paid,
                'initial_amount' => $request->initial_amount,
                'show_remaining' => $request->show_remaining,
                'country_id' => $country,
                'image' => 'storage/' . $path,
                'active' => $request->active,
            ]);
        }

        Flash::success(__('messages.saved', ['model' => __('models/projects.singular')]));

        return redirect(route('admin.projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Project $project */
        $project = Project::find($id);

        if (empty($project)) {
            Flash::error(__('models/projects.singular').' '.__('messages.not_found'));

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Project $project */
        $project = Project::find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        /** @var Project $project */
        $project = Project::find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'projects/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $project->fill($input);
        $project->save();


        Flash::success(__('messages.updated', ['model' => __('models/projects.singular')]));

        return redirect(route('admin.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Project $project */
        $project = Project::find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        $project->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/projects.singular')]));

        return redirect(route('admin.projects.index'));
    }

    public function projectsDetails(){
        $projectsDetails = SitePagesDetail::projectsPage()->first();

        return view('admin.projects.page', compact('projectsDetails'));
    }

    public function projectsDetailsUpdate(Request $request){
        SitePagesDetail::projectsPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        return redirect(route('admin.projectsPage.edit'))
            ->with('message', 'تم التعديل بنجاح');
    }

    public function changeStatus(Project $project){

        $project->active = !$project->active;
        $project->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.projects.index'));
    }

    public function homepageUpdate(Project $project){

        $project->homepage = !$project->homepage;
        $project->save();

        return true;
    }
}
