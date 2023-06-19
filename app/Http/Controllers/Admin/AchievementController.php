<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AchievementDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateAchievementRequest;
use App\Http\Requests\Admin\UpdateAchievementRequest;
use App\Models\Achievement;
use Flash;
use Response;

class AchievementController extends AppBaseController
{
    /**
     * Display a listing of the Achievement.
     *
     * @param AchievementDataTable $achievementDataTable
     *
     * @return Response
     */
    public function index(AchievementDataTable $achievementDataTable)
    {
        return $achievementDataTable->render('admin.achievements.index');
    }

    /**
     * Show the form for creating a new Achievement.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created Achievement in storage.
     *
     * @param CreateAchievementRequest $request
     *
     * @return Response
     */
    public function store(CreateAchievementRequest $request)
    {
        $input = $request->all();

        /** @var Achievement $achievement */
        $achievement = Achievement::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/achievements.singular')]));

        return redirect(route('admin.achievements.index'));
    }

    /**
     * Display the specified Achievement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Achievement $achievement */
        $achievement = Achievement::find($id);

        if (empty($achievement)) {
            Flash::error(__('models/achievements.singular').' '.__('messages.not_found'));

            return redirect(route('admin.achievements.index'));
        }

        return view('admin.achievements.show')->with('achievement', $achievement);
    }

    /**
     * Show the form for editing the specified Achievement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Achievement $achievement */
        $achievement = Achievement::find($id);

        if (empty($achievement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/achievements.singular')]));

            return redirect(route('admin.achievements.index'));
        }

        return view('admin.achievements.edit')->with('achievement', $achievement);
    }

    /**
     * Update the specified Achievement in storage.
     *
     * @param int $id
     * @param UpdateAchievementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAchievementRequest $request)
    {
        /** @var Achievement $achievement */
        $achievement = Achievement::find($id);

        if (empty($achievement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/achievements.singular')]));

            return redirect(route('admin.achievements.index'));
        }

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'achievments/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }


        $achievement->fill($input);
        $achievement->save();

        Flash::success(__('messages.updated', ['model' => __('models/achievements.singular')]));

        return redirect(route('admin.achievements.index'));
    }

    /**
     * Remove the specified Achievement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Achievement $achievement */
        $achievement = Achievement::find($id);

        if (empty($achievement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/achievements.singular')]));

            return redirect(route('admin.achievements.index'));
        }

        $achievement->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/achievements.singular')]));

        return redirect(route('admin.achievements.index'));
    }
}
