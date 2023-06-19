<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SettingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateSettingRequest;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use Flash;
use Response;

class SettingController extends AppBaseController
{
    /**
     * Display a listing of the Setting.
     *
     * @param SettingDataTable $settingDataTable
     *
     * @return Response
     */
    public function index(SettingDataTable $settingDataTable)
    {
        return $settingDataTable->render('admin.settings.index');
    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        /** @var Setting $setting */
        $setting = Setting::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/settings.singular')]));

        return redirect(route('admin.settings.index'));
    }

    /**
     * Display the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Setting $setting */
        $setting = Setting::find($id);

        if (empty($setting)) {
            Flash::error(__('models/settings.singular').' '.__('messages.not_found'));

            return redirect(route('admin.settings.index'));
        }

        return view('admin.settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Setting $setting */
        $setting = Setting::find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('admin.settings.index'));
        }

        return view('admin.settings.edit')->with('setting', $setting);
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param int $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        /** @var Setting $setting */
        $setting = Setting::find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('admin.settings.index'));
        }

        $setting->fill($request->all());
        $setting->save();

        Flash::success(__('messages.updated', ['model' => __('models/settings.singular')]));

        return redirect(route('admin.settings.edit', 1));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Setting $setting */
        $setting = Setting::find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('admin.settings.index'));
        }

        $setting->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/settings.singular')]));

        return redirect(route('admin.settings.index'));
    }
}
