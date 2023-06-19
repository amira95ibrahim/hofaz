<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\GiftDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateGiftRequest;
use App\Http\Requests\Admin\UpdateGiftRequest;
use App\Models\Gift;
use App\Services\ProjectService;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Response;

class GiftController extends AppBaseController
{
    /**
     * Display a listing of the Gift.
     *
     * @param GiftDataTable $giftDataTable
     *
     * @return Response
     */
    public function index(GiftDataTable $giftDataTable)
    {
        return $giftDataTable->render('admin.gifts.index');
    }

    /**
     * Show the form for creating a new Gift.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $gifts = Gift::active()->get();

        $giftArray = [];
        foreach($gifts as $gift){
            $giftArray[] = $gift->model . '_' . $gift->model_id;
        }

        return view('admin.gifts.create')->with('gifts', $giftArray);
    }

    /**
     * Store a newly created Gift in storage.
     *
     * @param CreateGiftRequest $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {

        Gift::whereActive(true)->update(['active' => false]);

        if($request->gift_select){
            foreach ($request->gift_select as $gift){
                $modelArray = explode('_', $gift);
                $model = $modelArray[0];
                $model_id = $modelArray[1];

                Gift::updateOrCreate(['model' => $model, 'model_id' => $model_id], ['active' => true]);
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/gifts.singular')]));

        return redirect(route('admin.gifts.create'));
    }

    /**
     * Display the specified Gift.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Gift $gift */
        $gift = Gift::find($id);

        if (empty($gift)) {
            Flash::error(__('models/gifts.singular').' '.__('messages.not_found'));

            return redirect(route('admin.gifts.index'));
        }

        return view('admin.gifts.show')->with('gift', $gift);
    }

    /**
     * Show the form for editing the specified Gift.
     *
     *
     * @return Response
     */
    public function edit()
    {
        /** @var Gift $gift */
        $giftIds = Gift::active()->get()->pluck('model_id');

        return view('admin.gifts.edit')->with('giftIds', $giftIds);
    }

    /**
     * Update the specified Gift in storage.
     *
     * @param int $id
     * @param UpdateGiftRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGiftRequest $request)
    {
        /** @var Gift $gift */
        $gift = Gift::find($id);

        if (empty($gift)) {
            Flash::error(__('messages.not_found', ['model' => __('models/gifts.singular')]));

            return redirect(route('admin.gifts.index'));
        }

        $gift->fill($request->all());
        $gift->save();

        Flash::success(__('messages.updated', ['model' => __('models/gifts.singular')]));

        return redirect(route('admin.gifts.index'));
    }

    /**
     * Remove the specified Gift from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Gift $gift */
        $gift = Gift::find($id);

        if (empty($gift)) {
            Flash::error(__('messages.not_found', ['model' => __('models/gifts.singular')]));

            return redirect(route('admin.gifts.index'));
        }

        $gift->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/gifts.singular')]));

        return redirect(route('admin.gifts.index'));
    }
}
