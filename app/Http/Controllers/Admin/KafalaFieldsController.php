<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\KafalaFieldsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateKafalaFieldsRequest;
use App\Http\Requests\Admin\UpdateKafalaFieldsRequest;
use App\Models\KafalaField;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class KafalaFieldsController extends AppBaseController
{
    /**
     * Display a listing of the KafalaField.
     *
     * @param KafalaFieldsDataTable $kafalaFieldsDataTable
     *
     * @return Response
     */
    public function index(KafalaFieldsDataTable $kafalaFieldsDataTable)
    {
        return $kafalaFieldsDataTable->render('admin.kafala_fields.index');
    }

    /**
     * Show the form for creating a new KafalaField.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kafala_fields.create');
    }

    /**
     * Store a newly created KafalaField in storage.
     *
     * @param CreateKafalaFieldsRequest $request
     *
     * @return Response
     */
    public function store(CreateKafalaFieldsRequest $request)
    {
        $input = $request->all();

        /** @var KafalaField $kafalaFields */
        $kafalaFields = KafalaField::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/kafalaFields.singular')]));

        return redirect(route('admin.kafalaFields.index'));
    }

    /**
     * Display the specified KafalaField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KafalaField $kafalaFields */
        $kafalaFields = KafalaField::find($id);

        if (empty($kafalaFields)) {
            Flash::error(__('models/kafalaFields.singular').' '.__('messages.not_found'));

            return redirect(route('admin.kafalaFields.index'));
        }

        return view('admin.kafala_fields.show')->with('kafalaFields', $kafalaFields);
    }

    /**
     * Show the form for editing the specified KafalaField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var KafalaField $kafalaFields */
        $kafalaFields = KafalaField::find($id);

        if (empty($kafalaFields)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaFields.singular')]));

            return redirect(route('admin.kafalaFields.index'));
        }

        return view('admin.kafala_fields.edit')->with('kafalaFields', $kafalaFields);
    }

    /**
     * Update the specified KafalaField in storage.
     *
     * @param int $id
     * @param UpdateKafalaFieldsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKafalaFieldsRequest $request)
    {
        /** @var KafalaField $kafalaFields */
        $kafalaFields = KafalaField::find($id);

        if (empty($kafalaFields)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaFields.singular')]));

            return redirect(route('admin.kafalaFields.index'));
        }

        $kafalaFields->fill($request->all());
        $kafalaFields->save();

        Flash::success(__('messages.updated', ['model' => __('models/kafalaFields.singular')]));

        return redirect(route('admin.kafalaFields.index'));
    }

    /**
     * Remove the specified KafalaField from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KafalaField $kafalaFields */
        $kafalaFields = KafalaField::find($id);

        if (empty($kafalaFields)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaFields.singular')]));

            return redirect(route('admin.kafalaFields.index'));
        }

        DB::beginTransaction();
        try {
            $kafalaFields->forceDelete();

        } catch (\Illuminate\Database\QueryException $e) {
            Flash::error('هذا الحقل مستخدم');

            return redirect(route('admin.kafalaFields.index'));
        }

        DB::rollback();
        KafalaField::find($id)->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/kafalaFields.singular')]));

        return redirect(route('admin.kafalaFields.index'));
    }
}
