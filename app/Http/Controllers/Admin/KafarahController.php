<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\kafarahDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreatekafarahRequest;
use App\Http\Requests\Admin\UpdatekafarahRequest;
use App\Models\SitePagesDetail;
use App\Models\kafarah;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Admin\AdminController;


class KafarahController extends AppBaseController
{
    /**
     * Display a listing of the kafarah.
     *
     * @param kafarahDataTable $kafarahDataTable
     *
     * @return Response
     */
    public function index(kafarahDataTable $kafarahDataTable)
    {
        return $kafarahDataTable->render('admin.kafarah.index');
    }


    /**
     * Show the form for creating a new kafarah.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kafarah.create');
    }

    /**
     * Store a newly created kafarah in storage.
     *
     * @param CreatekafarahRequest $request
     *
     * @return Response
     */
    public function store(CreatekafarahRequest $request)
        {
            $input = $request->all();


            $kafarah = kafarah::create($input);

            Flash::success(__('messages.saved', ['model' => 'تم الاضافة بنجاح']));

            return redirect(route('admin.Kafarah.index'));
        }


    /**
     * Display the specified kafarah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kafarah $kafarah */
        $kafarah = kafarah::find($id);

        if (empty($kafarah)) {
            Flash::error(__('models/kafarah.singular').' '.__('messages.not_found'));

            return redirect(route('admin.Kafarah.index'));
        }

        return view('admin.kafarah.show')->with('kafarah', $kafarah);
    }
    /**
     * Show the form for editing the specified kafarah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var kafarah $kafarah */
        $kafarah = kafarah::find($id);

        if (empty($kafarah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafarah.singular')]));

            return redirect(route('admin.Kafarah.index'));
        }

        return view('admin.kafarah.edit')->with('kafarah', $kafarah);
    }


    /**
     * Update the specified kafarah in storage.
     *
     * @param int $id
     * @param UpdatekafarahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekafarahRequest $request)
    {
        /** @var kafarah $kafarah */
        $kafarah = kafarah::find($id);

        if (empty($kafarah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafarah.singular')]));

            return redirect(route('admin.Kafarah.index'));
        }

        $kafarah->fill($request->all());
        $kafarah->save();

        Flash::success(__('messages.updated', ['model' => __('models/kafarah.singular')]));

        return redirect(route('admin.Kafarah.index'));
    }



    /**
     * Remove the specified kafarah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kafarah $kafarah */
        $kafarah = kafarah::find($id);

        if (empty($kafarah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafarah.singular')]));

            return redirect(route('admin.Kafarah.index'));
        }

        $kafarah->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/kafarah.singular')]));

        return redirect(route('admin.Kafarah.index'));
    }

    public function kafarahDetails(){
        $kafarahDetails = SitePagesDetail::kafarahPage()->first();

        return view('admin.kafarah.page', compact('kafarahDetails'));
    }



    public function kafarahDetailsUpdate(Request $request){
        SitePagesDetail::kafarahPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'kafarah/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            SitePagesDetail::kafarahPage()->update(['image' => 'storage/' . $path]);

        }

        return redirect(route('admin.KafarahPage.edit'))
            ->with('message',  __('messages.updated', ['model' => __('models/kafarah.singular')]));
    }


    public function changeStatus(kafarah $kafarah){

        $kafarah->active = !$kafarah->active;
        $kafarah->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.Kafarah.index'));
    }

    // public function homepageUpdate(kafarah $kafarah){

    //     $kafarah->homepage = !$kafarah->homepage;
    //     $kafarah->save();

    //     return true;
    // }
}
