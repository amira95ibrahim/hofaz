<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SubscriberDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateSubscriberRequest;
use App\Http\Requests\Admin\UpdateSubscriberRequest;
use App\Models\Subscriber;
use Flash;
use Response;

class SubscriberController extends AppBaseController
{
    /**
     * Display a listing of the Subscriber.
     *
     * @param SubscriberDataTable $subscriberDataTable
     *
     * @return Response
     */
    public function index(SubscriberDataTable $subscriberDataTable)
    {
        return $subscriberDataTable->render('admin.subscribers.index');
    }

    /**
     * Show the form for creating a new Subscriber.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created Subscriber in storage.
     *
     * @param CreateSubscriberRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscriberRequest $request)
    {
        $input = $request->all();

        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/subscribers.singular')]));

        return redirect(route('admin.subscribers.index'));
    }

    /**
     * Display the specified Subscriber.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::find($id);

        if (empty($subscriber)) {
            Flash::error(__('models/subscribers.singular').' '.__('messages.not_found'));

            return redirect(route('admin.subscribers.index'));
        }

        return view('admin.subscribers.show')->with('subscriber', $subscriber);
    }

    /**
     * Show the form for editing the specified Subscriber.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::find($id);

        if (empty($subscriber)) {
            Flash::error(__('messages.not_found', ['model' => __('models/subscribers.singular')]));

            return redirect(route('admin.subscribers.index'));
        }

        return view('admin.subscribers.edit')->with('subscriber', $subscriber);
    }

    /**
     * Update the specified Subscriber in storage.
     *
     * @param int $id
     * @param UpdateSubscriberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscriberRequest $request)
    {
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::find($id);

        if (empty($subscriber)) {
            Flash::error(__('messages.not_found', ['model' => __('models/subscribers.singular')]));

            return redirect(route('admin.subscribers.index'));
        }

        $subscriber->fill($request->all());
        $subscriber->save();

        Flash::success(__('messages.updated', ['model' => __('models/subscribers.singular')]));

        return redirect(route('admin.subscribers.index'));
    }

    /**
     * Remove the specified Subscriber from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::find($id);

        if (empty($subscriber)) {
            Flash::error(__('messages.not_found', ['model' => __('models/subscribers.singular')]));

            return redirect(route('admin.subscribers.index'));
        }

        $subscriber->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/subscribers.singular')]));

        return redirect(route('admin.subscribers.index'));
    }
}
