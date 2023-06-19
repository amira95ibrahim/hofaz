<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NavSectionDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateNavSectionRequest;
use App\Http\Requests\Admin\UpdateNavSectionRequest;
use App\Models\NavSection;
use Flash;
use Response;

class NavSectionController extends AppBaseController
{
    /**
     * Display a listing of the NavSection.
     *
     * @param NavSectionDataTable $navSectionDataTable
     *
     * @return Response
     */
    public function index(NavSectionDataTable $navSectionDataTable)
    {
        return $navSectionDataTable->render('admin.nav_sections.index');
    }

    /**
     * Show the form for creating a new NavSection.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.nav_sections.create');
    }

    /**
     * Store a newly created NavSection in storage.
     *
     * @param CreateNavSectionRequest $request
     *
     * @return Response
     */
    public function store(CreateNavSectionRequest $request)
    {
        $input = $request->all();

        /** @var NavSection $navSection */
        $navSection = NavSection::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/navSections.singular')]));

        return redirect(route('admin.navSections.index'));
    }

    /**
     * Display the specified NavSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NavSection $navSection */
        $navSection = NavSection::find($id);

        if (empty($navSection)) {
            Flash::error(__('models/navSections.singular').' '.__('messages.not_found'));

            return redirect(route('admin.navSections.index'));
        }

        return view('admin.nav_sections.show')->with('navSection', $navSection);
    }

    /**
     * Show the form for editing the specified NavSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var NavSection $navSection */
        $navSection = NavSection::find($id);

        if (empty($navSection)) {
            Flash::error(__('messages.not_found', ['model' => __('models/navSections.singular')]));

            return redirect(route('admin.navSections.index'));
        }

        return view('admin.nav_sections.edit')->with('navSection', $navSection);
    }

    /**
     * Update the specified NavSection in storage.
     *
     * @param int $id
     * @param UpdateNavSectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNavSectionRequest $request)
    {
        /** @var NavSection $navSection */
        $navSection = NavSection::find($id);

        if (empty($navSection)) {
            Flash::error(__('messages.not_found', ['model' => __('models/navSections.singular')]));

            return redirect(route('admin.navSections.index'));
        }

        $navSection->fill($request->all());
        $navSection->save();

        Flash::success(__('messages.updated', ['model' => __('models/navSections.singular')]));

        return redirect(route('admin.navSections.index'));
    }

    /**
     * Remove the specified NavSection from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NavSection $navSection */
        $navSection = NavSection::find($id);

        if (empty($navSection)) {
            Flash::error(__('messages.not_found', ['model' => __('models/navSections.singular')]));

            return redirect(route('admin.navSections.index'));
        }

        $navSection->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/navSections.singular')]));

        return redirect(route('admin.navSections.index'));
    }

    public function changeStatus(NavSection $NavSection){

        $NavSection->active = !$NavSection->active;
        $NavSection->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.navSections.index'));
    }
}
