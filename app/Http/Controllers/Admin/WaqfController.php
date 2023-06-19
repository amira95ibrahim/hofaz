<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\WaqfDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateWaqfRequest;
use App\Http\Requests\Admin\UpdateWaqfRequest;
use App\Models\SitePagesDetail;
use App\Models\Waqf;
use Flash;
use Illuminate\Http\Request;
use Response;

class WaqfController extends AppBaseController
{
    /**
     * Display a listing of the Waqf.
     *
     * @param WaqfDataTable $waqfDataTable
     *
     * @return Response
     */
    public function index(WaqfDataTable $waqfDataTable)
    {
        return $waqfDataTable->render('admin.waqf.index');
    }

    /**
     * Show the form for creating a new Waqf.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.waqf.create');
    }

    /**
     * Store a newly created Waqf in storage.
     *
     * @param CreateWaqfRequest $request
     *
     * @return Response
     */
    public function store(CreateWaqfRequest $request)
    {
        $input = $request->all();

        foreach ($request->country_id as $country){
            $image = $request->file('image');
            $path = 'waqf/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            Waqf::create([
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

        Flash::success(__('messages.saved', ['model' => __('models/waqf.singular')]));

        return redirect(route('admin.waqf.index'));
    }

    /**
     * Display the specified Waqf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Waqf $waqf */
        $waqf = Waqf::find($id);

        if (empty($waqf)) {
            Flash::error(__('models/waqf.singular').' '.__('messages.not_found'));

            return redirect(route('admin.waqf.index'));
        }

        return view('admin.waqf.show')->with('waqf', $waqf);
    }

    /**
     * Show the form for editing the specified Waqf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Waqf $waqf */
        $waqf = Waqf::find($id);

        if (empty($waqf)) {
            Flash::error(__('messages.not_found', ['model' => __('models/waqf.singular')]));

            return redirect(route('admin.waqf.index'));
        }

        return view('admin.waqf.edit')->with('waqf', $waqf);
    }

    /**
     * Update the specified Waqf in storage.
     *
     * @param int $id
     * @param UpdateWaqfRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWaqfRequest $request)
    {
        /** @var Waqf $waqf */
        $waqf = Waqf::find($id);

        if (empty($waqf)) {
            Flash::error(__('messages.not_found', ['model' => __('models/waqf.singular')]));

            return redirect(route('admin.waqf.index'));
        }

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'waqf/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $waqf->fill($input);
        $waqf->save();

        Flash::success(__('messages.updated', ['model' => __('models/waqf.singular')]));

        return redirect(route('admin.waqf.index'));
    }

    /**
     * Remove the specified Waqf from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Waqf $waqf */
        $waqf = Waqf::find($id);

        if (empty($waqf)) {
            Flash::error(__('messages.not_found', ['model' => __('models/waqf.singular')]));

            return redirect(route('admin.waqf.index'));
        }

        $waqf->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/waqf.singular')]));

        return redirect(route('admin.waqf.index'));
    }

    public function waqfDetails(){
        $waqfDetails = SitePagesDetail::WaqfPage()->first();

        return view('admin.waqf.page', compact('waqfDetails'));
    }

    public function waqfDetailsUpdate(Request $request){
        SitePagesDetail::WaqfPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        return redirect(route('admin.waqfPage.edit'))
            ->with('message', 'تم التعديل بنجاح');
    }

    public function changeStatus(Waqf $waqf){

        $waqf->active = !$waqf->active;
        $waqf->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.waqf.index'));
    }

    public function homepageUpdate(Waqf $waqf){

        $waqf->homepage = !$waqf->homepage;
        $waqf->save();

        return true;
    }
}
