<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ZakahDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateZakahRequest;
use App\Http\Requests\Admin\UpdateZakahRequest;
use App\Models\SitePagesDetail;
use App\Models\Zakah;
use Flash;
use Illuminate\Http\Request;
use Response;

class ZakahController extends AppBaseController
{
    /**
     * Display a listing of the Zakah.
     *
     * @param ZakahDataTable $zakahDataTable
     *
     * @return Response
     */
    public function index(ZakahDataTable $zakahDataTable)
    {
        return $zakahDataTable->render('admin.zakat.index');
    }

    /**
     * Show the form for creating a new Zakah.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.zakat.create');
    }

    /**
     * Store a newly created Zakah in storage.
     *
     * @param CreateZakahRequest $request
     *
     * @return Response
     */
    public function store(CreateZakahRequest $request)
    {
        $input = $request->all();

        /** @var Zakah $zakah */
        $zakah = Zakah::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/zakat.singular')]));

        return redirect(route('admin.zakat.index'));
    }

    /**
     * Display the specified Zakah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Zakah $zakah */
        $zakah = Zakah::find($id);

        if (empty($zakah)) {
            Flash::error(__('models/zakat.singular').' '.__('messages.not_found'));

            return redirect(route('admin.zakat.index'));
        }

        return view('admin.zakat.show')->with('zakah', $zakah);
    }

    /**
     * Show the form for editing the specified Zakah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Zakah $zakah */
        $zakah = Zakah::find($id);

        if (empty($zakah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zakat.singular')]));

            return redirect(route('admin.zakat.index'));
        }

        return view('admin.zakat.edit')->with('zakah', $zakah);
    }

    /**
     * Update the specified Zakah in storage.
     *
     * @param int $id
     * @param UpdateZakahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZakahRequest $request)
    {
        /** @var Zakah $zakah */
        $zakah = Zakah::find($id);

        if (empty($zakah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zakat.singular')]));

            return redirect(route('admin.zakat.index'));
        }

        $zakah->fill($request->all());
        $zakah->save();

        Flash::success(__('messages.updated', ['model' => __('models/zakat.singular')]));

        return redirect(route('admin.zakat.index'));
    }

    /**
     * Remove the specified Zakah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Zakah $zakah */
        $zakah = Zakah::find($id);

        if (empty($zakah)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zakat.singular')]));

            return redirect(route('admin.zakat.index'));
        }

        $zakah->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/zakat.singular')]));

        return redirect(route('admin.zakat.index'));
    }


    public function zakahDetails(){
        $zakahDetails = SitePagesDetail::zakahPage()->first();

        return view('admin.zakat.page')->with('zakahDetails', $zakahDetails);
    }

    public function zakahDetailsUpdate(Request $request){
        SitePagesDetail::zakahPage()->update($request->only(['title_en', 'title_ar', 'details_en', 'details_ar']));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'zakah/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            SitePagesDetail::zakahPage()->update(['image' => 'storage/' . $path]);

        }

        return redirect(route('admin.zakahPage.edit'))
            ->with('message', __('messages.updated', ['model' => __('models/zakah.singular')]));
    }

    public function changeStatus(Zakah $zakah){

        $zakah->active = !$zakah->active;
        $zakah->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.zakat.index'));
    }
}
