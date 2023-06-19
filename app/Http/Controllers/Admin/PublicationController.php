<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PublicationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreatePublicationRequest;
use App\Http\Requests\Admin\UpdatePublicationRequest;
use App\Models\Publication;
use Flash;
use Illuminate\Support\Facades\Log;
use Response;

class PublicationController extends AppBaseController
{
    /**
     * Display a listing of the Publication.
     *
     * @param PublicationDataTable $publicationDataTable
     *
     * @return Response
     */
    public function index(PublicationDataTable $publicationDataTable)
    {
        return $publicationDataTable->render('admin.publications.index');
    }

    /**
     * Show the form for creating a new Publication.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.publications.create');
    }

    /**
     * Store a newly created Publication in storage.
     *
     * @param CreatePublicationRequest $request
     *
     * @return Response
     */
    public function store(CreatePublicationRequest $request)
    {
        $input = $request->all();

        $image = $request->file('image');
        $path = 'publications/' . time() . rand() .  '.' . $image->extension();
        $image->storeAs('public/', $path);

        $input['image'] = 'storage/' . $path;

        $pdf = $request->file('pdf');
        $pdfPath = 'publications/pdfs/' . time() . rand() .  '.' . $pdf->extension();
        $pdf->storeAs('public/', $pdfPath);

        $input['pdf'] = 'storage/' . $pdfPath;

        /** @var Publication $publication */
        $publication = Publication::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }

    /**
     * Display the specified Publication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('models/publications.singular').' '.__('messages.not_found'));

            return redirect(route('admin.publications.index'));
        }

        return view('admin.publications.show')->with('publication', $publication);
    }

    /**
     * Show the form for editing the specified Publication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('messages.not_found', ['model' => __('models/publications.singular')]));

            return redirect(route('admin.publications.index'));
        }

        return view('admin.publications.edit')->with('publication', $publication);
    }

    /**
     * Update the specified Publication in storage.
     *
     * @param int $id
     * @param UpdatePublicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePublicationRequest $request)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('messages.not_found', ['model' => __('models/publications.singular')]));

            return redirect(route('admin.publications.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'publications/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        if($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfPath = 'publications/pdfs/' . time() . rand() . '.' . $pdf->extension();
            $pdf->storeAs('public/', $pdfPath);

            $input['pdf'] = 'storage/' . $pdfPath;
        }

        $publication->fill($input);
        $publication->save();

        Flash::success(__('messages.updated', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }

    /**
     * Remove the specified Publication from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Publication $publication */
        $publication = Publication::find($id);

        if (empty($publication)) {
            Flash::error(__('messages.not_found', ['model' => __('models/publications.singular')]));

            return redirect(route('admin.publications.index'));
        }

        $publication->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/publications.singular')]));

        return redirect(route('admin.publications.index'));
    }

    public function homepageUpdate(Publication $publication){

        $publication->homepage = !$publication->homepage;
        $publication->save();

        return true;
    }
}
