<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\KafalaDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateKafalaRequest;
use App\Http\Requests\Admin\UpdateKafalaRequest;
use App\Models\Kafala;
use App\Models\KafalaValue;
use App\Models\SitePagesDetail;
use Flash;
use Illuminate\Http\Request;
use Response;

class KafalaController extends AppBaseController
{
    /**
     * Display a listing of the Kafala.
     *
     * @param KafalaDataTable $kafalaDataTable
     *
     * @return Response
     */
    public function index(KafalaDataTable $kafalaDataTable)
    {
        return $kafalaDataTable->render('admin.kafalat.index');
    }

    /**
     * Show the form for creating a new Kafala.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kafalat.create');
    }

    /**
     * Store a newly created Kafala in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $image = $request->file('image');
        $path = 'projects/' . time() . rand() .  '.' . $image->extension();
        $image->storeAs('public/', $path);

        $input['image'] = 'storage/' . $path;

        /** @var Kafala $kafala */
        $kafala = Kafala::create($input);

        foreach ($input['fields'] as $key => $value){
            $kafala->kafalatValues()->attach([$key => ['value_en' => $value, 'value_ar' => $value]]);
        }

        Flash::success(__('messages.saved', ['model' => __('models/kafalat.singular')]));

        return redirect(route('admin.kafalat.index'));
    }

    /**
     * Display the specified Kafala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kafala $kafala */
        $kafala = Kafala::find($id);

        if (empty($kafala)) {
            Flash::error(__('models/kafalat.singular').' '.__('messages.not_found'));

            return redirect(route('admin.kafalat.index'));
        }

        return view('admin.kafalat.show')->with('kafala', $kafala);
    }

    /**
     * Show the form for editing the specified Kafala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Kafala $kafala */
        $kafala = Kafala::find($id);

        if (empty($kafala)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalat.singular')]));

            return redirect(route('admin.kafalat.index'));
        }

        return view('admin.kafalat.edit')->with('kafala', $kafala);
    }

    /**
     * Update the specified Kafala in storage.
     *
     * @param int $id
     * @param UpdateKafalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKafalaRequest $request)
    {
        /** @var Kafala $kafala */
        $kafala = Kafala::find($id);

        if (empty($kafala)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalat.singular')]));

            return redirect(route('admin.kafalat.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'projects/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $kafala->fill($input);
        $kafala->save();

        KafalaValue::where('kafala_id' , $id)->delete();
        foreach ($input['fields'] as $key => $value){
            $kafala->kafalatValues()->attach([$key => ['value_en' => $value, 'value_ar' => $value]]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/kafalat.singular')]));

        return redirect(route('admin.kafalat.index'));
    }

    /**
     * Remove the specified Kafala from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kafala $kafala */
        $kafala = Kafala::find($id);

        if (empty($kafala)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalat.singular')]));

            return redirect(route('admin.kafalat.index'));
        }

        $kafala->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/kafalat.singular')]));

        return redirect(route('admin.kafalat.index'));
    }

    public function kafalahDetails(){
        $kafalahDetails = SitePagesDetail::kafalahPage()->first();

        return view('admin.kafalat.page')->with('kafalahDetails', $kafalahDetails);
    }

    public function kafalahDetailsUpdate(Request $request){
        SitePagesDetail::kafalahPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        return redirect(route('admin.kafalahPage.edit'))
            ->with('message', __('messages.updated', ['model' => __('models/zakah.singular')]));
    }

    public function changeStatus(Kafala $kafala){

        $kafala->active = !$kafala->active;
        $kafala->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.kafalat.index'));
    }
}
