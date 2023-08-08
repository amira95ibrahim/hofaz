<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\IftarDataTable;
use App\Models\SitePagesDetail;
use App\Http\Controllers\AppBaseController;
use App\Models\Iftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Response;
use Illuminate\Support\Facades\Storage;

class IftarController extends AppBaseController
{

    public function index(IftarDataTable $iftarDataTable)
    {
        return $iftarDataTable->render('admin.iftar.index');
    }


    public function create()
    {
        return view('admin.iftar.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $iftar = Iftar::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/iftar.singular')]));

        return redirect(route('admin.iftar.index'));
    }


    public function show($id)
    {

        $iftar = Iftar::find($id);

        if (empty($iftar)) {
            Flash::error(__('models/iftar.singular').' '.__('messages.not_found'));

            return redirect(route('admin.iftar.index'));
        }

        return view('admin.iftar.show')->with('iftar', $iftar);
    }

    public function edit($id)
    {
        /** @var Iftar $sadaqah */
        $iftar = Iftar::find($id);

        if (empty($iftar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/iftar.singular')]));

            return redirect(route('admin.iftar.index'));
        }

        return view('admin.iftar.edit')->with('iftar', $iftar);
    }

    public function update($id, Request $request)
    {

        $iftar = Iftar::find($id);

        if (empty($iftar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/iftar.singular')]));

            return redirect(route('admin.iftar.index'));
        }

        $iftar->fill($request->all());
        $iftar->save();

        Flash::success(__('messages.updated', ['model' => __('models/iftar.singular')]));

        return redirect(route('admin.iftar.index'));
    }

    public function destroy($id)
    {

        $iftar = Iftar::find($id);

        if (empty($iftar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/iftar.singular')]));

            return redirect(route('admin.iftar.index'));
        }

        $iftar->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/iftar.singular')]));

        return redirect(route('admin.iftar.index'));
    }



    // public function sadaqahDetails(){
    //     $sadaqahDetails = SitePagesDetail::sadaqahPage()->first();

    //     return view('admin.sadaqat.page')->with('sadaqahDetails', $sadaqahDetails);
    // }

    // public function sadaqahDetailsUpdate(Request $request){
    //     SitePagesDetail::SadaqahPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

    //     if($request->hasFile('image')){
    //         $image = $request->file('image');
    //         $path = 'sadaqah/' . time() . rand() .  '.' . $image->extension();
    //         $image->storeAs('public/', $path);

    //         SitePagesDetail::SadaqahPage()->update(['image' => 'storage/' . $path]);

    //     }

    //     return redirect(route('admin.sadaqahPage.edit'))
    //         ->with('message', __('messages.updated', ['model' => __('models/sadaqat.singular')]));
    // }

    // public function changeStatus(Iftar $iftar){
    //     $iftar->active = !$iftar->active;
    //     $iftar->save();

    //     Flash::success('تم تعديل الحالة بنجاح');

    //     return redirect(route('admin.iftar.index'));
    // }
}
