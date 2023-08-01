<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ReportsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketer;
use App\Models\Project;
use App\Models\Donation;


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


    public function index(Request $request, ReportsDataTable $reportsDataTable)
    {
        $query = Donation::query();
        $marketers = Marketer::pluck('name_ar', 'id');
        $projects = Project::pluck('name_ar', 'id');

        // Retrieve the filter values from the request
        $paymentMethod = $request->input('payment_method');
        $marketer = $request->input('marketer');
        $project = $request->input('project');
        $status = $request->input('status');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Apply the filters to the query
        if ($paymentMethod) {
        //   dd($paymentMethod,$marketer,$project,$status);
          $query->where('payment_method', $paymentMethod);
        }
        if ($marketer) {
            $query->whereHas('marketer', function ($q) use ($marketer) {
                $q->where('id', $marketer);
            });
        }
        if ($project) {
            $query->where('project_id', $project);
        }
        if ($status) {
            $query->where('status', $status);
        }
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('created_at', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }


            // Print the generated SQL query for troubleshooting
    $sql = $query->toSql();
     // Get the parameter bindings
     $bindings = $query->getBindings();

     // Replace placeholders with actual values in the SQL query
     $fullSql = vsprintf(str_replace(['%', '?'], ['%%', "'%s'"], $sql), $bindings);

     //dd($fullSql); // Print the SQL query with actual values for troubleshooting


        // Retrieve the filtered data
        $filteredData = $query->get();

        return $reportsDataTable->render('admin.reports.index', compact('filteredData', 'marketers', 'projects'));
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
