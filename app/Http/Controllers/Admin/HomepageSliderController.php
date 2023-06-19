<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\HomepageSliderDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateHomepageSliderRequest;
use App\Http\Requests\Admin\UpdateHomepageSliderRequest;
use App\Models\HomepageSlider;
use Flash;
use Illuminate\Support\Facades\URL;
use Response;

class HomepageSliderController extends AppBaseController
{
    /**
     * Display a listing of the HomepageSlider.
     *
     * @param HomepageSliderDataTable $homepageSliderDataTable
     *
     * @return Response
     */
    public function index(HomepageSliderDataTable $homepageSliderDataTable)
    {
        return $homepageSliderDataTable->render('admin.homepage_sliders.index');
    }

    /**
     * Show the form for creating a new HomepageSlider.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.homepage_sliders.create');
    }

    /**
     * Store a newly created HomepageSlider in storage.
     *
     * @param CreateHomepageSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateHomepageSliderRequest $request)
    {
        $input = $request->all();

        $image = $request->file('image');
        $path = 'homepage/slider/' . time() . rand() .  '.' . $image->extension();
        $image->storeAs('public/', $path);

        $input['image'] = 'storage/' . $path;

        $input['link'] = str_replace(URL::to('/'), '', $input['link']);

        /** @var HomepageSlider $homepageSlider */
        HomepageSlider::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/homepageSliders.singular')]));

        return redirect(route('admin.homepageSliders.index'));
    }

    /**
     * Display the specified HomepageSlider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomepageSlider $homepageSlider */
        $homepageSlider = HomepageSlider::find($id);

        if (empty($homepageSlider)) {
            Flash::error(__('models/homepageSliders.singular').' '.__('messages.not_found'));

            return redirect(route('admin.homepageSliders.index'));
        }

        return view('admin.homepage_sliders.show')->with('homepageSlider', $homepageSlider);
    }

    /**
     * Show the form for editing the specified HomepageSlider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomepageSlider $homepageSlider */
        $homepageSlider = HomepageSlider::find($id);

        if (empty($homepageSlider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/homepageSliders.singular')]));

            return redirect(route('admin.homepageSliders.index'));
        }

        $homepageSlider->link = URL::to('/') . $homepageSlider->link;

        return view('admin.homepage_sliders.edit')->with('homepageSlider', $homepageSlider);
    }

    /**
     * Update the specified HomepageSlider in storage.
     *
     * @param int $id
     * @param UpdateHomepageSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomepageSliderRequest $request)
    {
        /** @var HomepageSlider $homepageSlider */
        $homepageSlider = HomepageSlider::find($id);

        if (empty($homepageSlider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/homepageSliders.singular')]));

            return redirect(route('admin.homepageSliders.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'homepage/slider/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $input['link'] = str_replace(URL::to('/'), '', $input['link']);

        $homepageSlider->fill($input);
        $homepageSlider->save();

        Flash::success(__('messages.updated', ['model' => __('models/homepageSliders.singular')]));

        return redirect(route('admin.homepageSliders.index'));
    }

    /**
     * Remove the specified HomepageSlider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HomepageSlider $homepageSlider */
        $homepageSlider = HomepageSlider::find($id);

        if (empty($homepageSlider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/homepageSliders.singular')]));

            return redirect(route('admin.homepageSliders.index'));
        }

        $homepageSlider->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/homepageSliders.singular')]));

        return redirect(route('admin.homepageSliders.index'));
    }

    public function changeStatus(HomepageSlider $homepageSlider){

        $homepageSlider->active = !$homepageSlider->active;
        $homepageSlider->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.homepageSliders.index'));
    }
}
