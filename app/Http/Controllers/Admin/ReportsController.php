<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ReportsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketer;
use App\Models\Project;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(ReportsDataTable $reportsDataTable )
    // {
    //     return $reportsDataTable->render('admin.reports.index');

    // }


public function index(Request $request,ReportsDataTable $reportsDataTable )
{

    $marketers = Marketer::pluck('name_ar', 'id');
    $projects = Project::pluck('name_ar', 'id');

    $paymentMethod = $request->input('payment_method');
    $marketer = $request->input('marketer');
    $project = $request->input('project');
    $status = $request->input('status');
    $createdAt = $request->input('created_at');

    $dataTable = $reportsDataTable->render('admin.reports.index');

    // Filter the query based on the selected values
    if ($paymentMethod) {
        $dataTable->where('payment_method', $paymentMethod);
    }
    if ($marketer) {
        $dataTable->where('marketer_id', $marketer);
    }
    if($project) {
        $dataTable->where('project_id', $project);
    }
    if ($status) {
        $dataTable->where('status', $status);
    }
    if ($createdAt) {
        $dataTable->whereDate('created_at', $createdAt);
    }

    // $dataTable = $dataTable->make(true);

    // return view('admin.marketers.index', compact('options', 'dataTable'));
    // return $reportsDataTable->render('admin.reports.index');
    return $reportsDataTable->render('admin.reports.index', compact('marketers', 'projects'));

}
    // public function changeStatus(MarketersDataTable $MarketersDataTable){

    //     $MarketersDataTable->active = !$MarketersDataTable->active;
    //     $MarketersDataTable->save();

    //     Flash::success('تم تعديل الحالة بنجاح');

    //     return redirect(route('admin.marketers.index'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $projects = Project::Active()->select('id', 'name_' . app()->getLocale())->get();
        // return view('admin.marketers.create', compact('projects'));
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
        // foreach ($request->country_id as $country){
        //     $image = $request->file('image');
        //     $path = 'projects/' . time() . rand() .  '.' . $image->extension();
        //     $image->storeAs('public/', $path);

            // Marketer::create([
            //     'name_en' => $request->name_en,
            //     'name_ar' => $request->name_ar,
            //     'number'=>$request->initial_amount,
            //     'status' => $request->active,
            //     // 'category_id' => $request->category_id,
            // ]);
        // }

        Flash::success("تم أضافة مندوب جديد");

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

        // $marketer = Marketer::find($id);

        //  $projects = Project::Active()->select('id', 'name_' . app()->getLocale())->get();

        // if (empty($marketer)) {
        //     Flash::error(__('messages.not_found', ['model' => __('models/marketer.singular')]));

        //     return redirect(route('admin.marketers.index'));
        // }

        // return view('admin.marketers.edit')->with('marketer', $marketer)->with('projects', $projects);
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
        // $marketer = Marketer::find($id);

        // if (empty($marketer)) {
        //     Flash::error(__('messages.not_found', ['model' => __('models/marketers.singular')]));

        //     return redirect(route('admin.marketers.index'));
        // }

        // $input = $request->all();


        // $marketer->fill($input);
        // $marketer->save();


        // Flash::success(__('messages.updated', ['model' => __('models/marketers.singular')]));

        // return redirect(route('admin.marketers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $marketer = Marketer::find($id);

        // if (empty($marketer)) {
        //     Flash::error(__('messages.not_found', ['model' => __('models/marketer.singular')]));

        //     return redirect(route('admin.marketers.index'));
        // }

        // $marketer->delete();

        // Flash::success(__('messages.deleted', ['model' => __('models/marketers.singular')]));

        // return redirect(route('admin.marketers.index'));
    }
}
