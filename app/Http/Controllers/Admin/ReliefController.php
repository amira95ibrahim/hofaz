<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ReliefDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateReliefRequest;
use App\Http\Requests\Admin\UpdateReliefRequest;
use App\Models\Relief;
use App\Models\SitePagesDetail;
use Flash;
use Illuminate\Http\Request;
use Response;

class ReliefController extends AppBaseController
{
    /**
     * Display a listing of the Relief.
     *
     * @param ReliefDataTable $reliefDataTable
     *
     * @return Response
     */
    public function index(ReliefDataTable $reliefDataTable)
    {
        return $reliefDataTable->render('admin.reliefs.index');
    }

    /**
     * Show the form for creating a new Relief.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.reliefs.create');
    }

    /**
     * Store a newly created Relief in storage.
     *
     * @param CreateReliefRequest $request
     *
     * @return Response
     */
    public function store(CreateReliefRequest $request)
    {

        foreach ($request->country_id as $country){
            $image = $request->file('image');
            $path = 'relief/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            Relief::create([
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

        Flash::success(__('messages.saved', ['model' => __('models/reliefs.singular')]));

        return redirect(route('admin.reliefs.index'));
    }

    /**
     * Display the specified Relief.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Relief $relief */
        $relief = Relief::find($id);

        if (empty($relief)) {
            Flash::error(__('models/reliefs.singular').' '.__('messages.not_found'));

            return redirect(route('admin.reliefs.index'));
        }

        return view('admin.reliefs.show')->with('relief', $relief);
    }

    /**
     * Show the form for editing the specified Relief.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Relief $relief */
        $relief = Relief::find($id);

        if (empty($relief)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reliefs.singular')]));

            return redirect(route('admin.reliefs.index'));
        }

        return view('admin.reliefs.edit')->with('relief', $relief);
    }

    /**
     * Update the specified Relief in storage.
     *
     * @param int $id
     * @param UpdateReliefRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReliefRequest $request)
    {
        /** @var Relief $relief */
        $relief = Relief::find($id);

        if (empty($relief)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reliefs.singular')]));

            return redirect(route('admin.reliefs.index'));
        }

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'relief/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $relief->fill($input);
        $relief->save();

        Flash::success(__('messages.updated', ['model' => __('models/reliefs.singular')]));

        return redirect(route('admin.reliefs.index'));
    }

    /**
     * Remove the specified Relief from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Relief $relief */
        $relief = Relief::find($id);

        if (empty($relief)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reliefs.singular')]));

            return redirect(route('admin.reliefs.index'));
        }

        $relief->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/reliefs.singular')]));

        return redirect(route('admin.reliefs.index'));
    }

    public function reliefsDetails(){
        $reliefsDetails = SitePagesDetail::reliefPage()->first();

        return view('admin.reliefs.page', compact('reliefsDetails'));
    }

    public function reliefsDetailsUpdate(Request $request){
        SitePagesDetail::reliefPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        return redirect(route('admin.reliefsPage.edit'))
            ->with('message', 'تم التعديل بنجاح');
    }

    public function changeStatus(Relief $relief){

        $relief->active = !$relief->active;
        $relief->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.reliefs.index'));
    }

    public function homepageUpdate(Relief $relief){

        $relief->homepage = !$relief->homepage;
        $relief->save();

        return true;
    }
}
