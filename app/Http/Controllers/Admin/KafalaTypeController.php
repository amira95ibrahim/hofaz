<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\KafalaTypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateKafalaTypeRequest;
use App\Http\Requests\Admin\UpdateKafalaTypeRequest;
use App\Models\KafalaType;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class KafalaTypeController extends AppBaseController
{
    /**
     * Display a listing of the KafalaType.
     *
     * @param KafalaTypeDataTable $kafalaTypeDataTable
     *
     * @return Response
     */
    public function index(KafalaTypeDataTable $kafalaTypeDataTable)
    {
        return $kafalaTypeDataTable->render('admin.kafala_types.index');
    }

    /**
     * Show the form for creating a new KafalaType.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.kafala_types.create');
    }

    /**
     * Store a newly created KafalaType in storage.
     *
     * @param CreateKafalaTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateKafalaTypeRequest $request)
    {
        $input = $request->all();

        /** @var KafalaType $kafalaType */
        $kafalaType = KafalaType::create($input);

        $kafalaType->kafalaFields()->sync($request->field_id);

        Flash::success(__('messages.saved', ['model' => __('models/kafalaTypes.singular')]));

        return redirect(route('admin.kafalaTypes.index'));
    }

    /**
     * Display the specified KafalaType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KafalaType $kafalaType */
        $kafalaType = KafalaType::find($id);

        if (empty($kafalaType)) {
            Flash::error(__('models/kafalaTypes.singular').' '.__('messages.not_found'));

            return redirect(route('admin.kafalaTypes.index'));
        }

        return view('admin.kafala_types.show')->with('kafalaType', $kafalaType);
    }

    /**
     * Show the form for editing the specified KafalaType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var KafalaType $kafalaType */
        $kafalaType = KafalaType::find($id);

        if (empty($kafalaType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaTypes.singular')]));

            return redirect(route('admin.kafalaTypes.index'));
        }

        return view('admin.kafala_types.edit')->with('kafalaType', $kafalaType);
    }

    /**
     * Update the specified KafalaType in storage.
     *
     * @param int $id
     * @param UpdateKafalaTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKafalaTypeRequest $request)
    {
        /** @var KafalaType $kafalaType */
        $kafalaType = KafalaType::find($id);

        if (empty($kafalaType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaTypes.singular')]));

            return redirect(route('admin.kafalaTypes.index'));
        }

        $kafalaType->fill($request->all());
        $kafalaType->save();

        $kafalaType->kafalaFields()->sync($request->field_id);

        Flash::success(__('messages.updated', ['model' => __('models/kafalaTypes.singular')]));

        return redirect(route('admin.kafalaTypes.index'));
    }

    /**
     * Remove the specified KafalaType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KafalaType $kafalaType */
        $kafalaType = KafalaType::find($id);

        if (empty($kafalaType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/kafalaTypes.singular')]));

            return redirect(route('admin.kafalaTypes.index'));
        }

        DB::beginTransaction();
        try {
            $kafalaType->forceDelete();

        } catch (\Illuminate\Database\QueryException $e) {
            Flash::error('هذا النوع مستخدم');

            return redirect(route('admin.kafalaTypes.index'));
        }

        DB::rollback();
        KafalaType::find($id)->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/kafalaTypes.singular')]));

        return redirect(route('admin.kafalaTypes.index'));
    }

    public function getTypeFields(KafalaType $type){

        return $type->kafalaFields;
    }
}
