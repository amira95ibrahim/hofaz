<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SadaqahDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSadaqahRequest;
use App\Http\Requests\Admin\UpdateSadaqahRequest;
use App\Models\Sadaqah;
use App\Models\SitePagesDetail;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Response;
use Illuminate\Support\Facades\Storage;

class SadaqahController extends AppBaseController
{
    /**
     * Display a listing of the Sadaqah.
     *
     * @param SadaqahDataTable $sadaqahDataTable
     *
     * @return Response
     */
    public function index(SadaqahDataTable $sadaqahDataTable)
    {
        return $sadaqahDataTable->render('admin.sadaqat.index');
    }

    /**
     * Show the form for creating a new Sadaqah.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sadaqat.create');
    }

    /**
     * Store a newly created Sadaqah in storage.
     *
     * @param CreateSadaqahRequest $request
     *
     * @return Response
     */
    public function store(CreateSadaqahRequest $request)
    {
        $input = $request->all();

        /** @var Sadaqah $sadaqah */
        $sadaqah = Sadaqah::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/sadaqat.singular')]));

        return redirect(route('admin.sadaqat.index'));
    }

    /**
     * Display the specified Sadaqah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sadaqah $sadaqah */
        $sadaqah = Sadaqah::find($id);

        if (empty($sadaqah)) {
            Flash::error(__('models/sadaqat.singular').' '.__('messages.not_found'));

            return redirect(route('admin.sadaqat.index'));
        }

        return view('admin.sadaqat.show')->with('sadaqah', $sadaqah);
    }

    /**
     * Show the form for editing the specified Sadaqah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Sadaqah $sadaqah */
        $sadaqah = Sadaqah::find($id);

        if (empty($sadaqah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sadaqat.singular')]));

            return redirect(route('admin.sadaqat.index'));
        }

        return view('admin.sadaqat.edit')->with('sadaqah', $sadaqah);
    }

    /**
     * Update the specified Sadaqah in storage.
     *
     * @param int $id
     * @param UpdateSadaqahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSadaqahRequest $request)
    {
        /** @var Sadaqah $sadaqah */
        $sadaqah = Sadaqah::find($id);

        if (empty($sadaqah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sadaqat.singular')]));

            return redirect(route('admin.sadaqat.index'));
        }

        $sadaqah->fill($request->all());
        $sadaqah->save();

        Flash::success(__('messages.updated', ['model' => __('models/sadaqat.singular')]));

        return redirect(route('admin.sadaqat.index'));
    }

    /**
     * Remove the specified Sadaqah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sadaqah $sadaqah */
        $sadaqah = Sadaqah::find($id);

        if (empty($sadaqah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sadaqat.singular')]));

            return redirect(route('admin.sadaqat.index'));
        }

        $sadaqah->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/sadaqat.singular')]));

        return redirect(route('admin.sadaqat.index'));
    }

    public function sadaqahDetails(){
        $sadaqahDetails = SitePagesDetail::sadaqahPage()->first();

        return view('admin.sadaqat.page')->with('sadaqahDetails', $sadaqahDetails);
    }

    public function sadaqahDetailsUpdate(Request $request){
        SitePagesDetail::SadaqahPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'sadaqah/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            SitePagesDetail::SadaqahPage()->update(['image' => 'storage/' . $path]);

        }

        return redirect(route('admin.sadaqahPage.edit'))
            ->with('message', __('messages.updated', ['model' => __('models/sadaqat.singular')]));
    }

    public function changeStatus(Sadaqah $sadaqah){
        $sadaqah->active = !$sadaqah->active;
        $sadaqah->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.sadaqat.index'));
    }
}
