<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CountryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Models\Country;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class CountryController extends AppBaseController
{
    /**
     * Display a listing of the Country.
     *
     * @param CountryDataTable $countryDataTable
     *
     * @return Response
     */
    public function index(CountryDataTable $countryDataTable)
    {
        return $countryDataTable->render('admin.countries.index');
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        /** @var Country $country */
        $country = Country::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('models/countries.singular').' '.__('messages.not_found'));

            return redirect(route('admin.countries.index'));
        }

        return view('admin.countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('admin.countries.index'));
        }

        return view('admin.countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param int $id
     * @param UpdateCountryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryRequest $request)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('admin.countries.index'));
        }

        $country->fill($request->all());
        $country->save();

        Flash::success(__('messages.updated', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Country $country */
        $country = Country::find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('admin.countries.index'));
        }

        DB::beginTransaction();
        try {
            $country->forceDelete();

        } catch (\Illuminate\Database\QueryException $e) {
            Flash::error('هذه الدولة مستخدمة');

            return redirect(route('admin.countries.index'));
        }

        DB::rollback();
        Country::find($id)->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/countries.singular')]));

        return redirect(route('admin.countries.index'));
    }
}
