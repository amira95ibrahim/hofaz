<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\Admin\MarketersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Marketer;

use Illuminate\Http\Request;
use App\Models\Project;
use Flash;

class MarketersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MarketersDataTable $MarketersDataTable )
    {
        return $MarketersDataTable->render('admin.marketers.index');

    }
    public function changeStatus(MarketersDataTable $MarketersDataTable){

        $MarketersDataTable->active = !$MarketersDataTable->active;
        $MarketersDataTable->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.marketers.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $projects = Project::Active()->select('id', 'name_' . app()->getLocale())->get();
        return view('admin.marketers.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $input = $request->all();
// dd($input);
        // Create the marketer
        $marketer = Marketer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'number' => $request->initial_amount,
            'status' => $request->active,
        ]);

        // Associate the related projects
        if ($request->has('project_id')) {
            $projectIds = $request->input('project_id');
            $marketer->projects()->attach($projectIds);
        }

        Flash::success("تم إضافة مندوب جديد");

        return redirect(route('admin.marketers.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $marketer = Marketer::find($id);

         $projects = Project::Active()->select('id', 'name_' . app()->getLocale())->get();

        if (empty($marketer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marketer.singular')]));

            return redirect(route('admin.marketers.index'));
        }

        return view('admin.marketers.edit')->with('marketer', $marketer)->with('projects', $projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $marketer = Marketer::find($id);

    if (empty($marketer)) {
        Flash::error(__('messages.not_found', ['model' => __('models/marketers.singular')]));
        return redirect(route('admin.marketers.index'));
    }

    $input = $request->all();

    $marketer->fill($input);
    $marketer->save();

    // Associate the related projects
    if ($request->has('project_id')) {
        $projectIds = $request->input('project_id');
        $marketer->projects()->sync($projectIds);
    } else {
        // If no projects are selected, detach all existing relationships
        $marketer->projects()->detach();
    }

    Flash::success(__('messages.updated', ['model' => __('models/marketers.singular')]));
    return redirect(route('admin.marketers.index'));
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $marketer = Marketer::find($id);

    //     if (empty($marketer)) {
    //         Flash::error(__('messages.not_found', ['model' => __('models/marketer.singular')]));

    //         return redirect(route('admin.marketers.index'));
    //     }

    //     $marketer->delete();

    //     Flash::success(__('messages.deleted', ['model' => __('models/marketers.singular')]));

    //     return redirect(route('admin.marketers.index'));
    // }
    public function destroy($id)
{
    $marketer = Marketer::find($id);

    if (empty($marketer)) {
        Flash::error(__('messages.not_found', ['model' => __('models/marketer.singular')]));
        return redirect(route('admin.marketers.index'));
    }

    // Detach the related projects before deleting the marketer
    $marketer->projects()->detach();

    $marketer->delete();

    Flash::success(__('messages.deleted', ['model' => __('models/marketers.singular')]));
    return redirect(route('admin.marketers.index'));
}

}
