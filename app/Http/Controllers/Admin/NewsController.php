<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NewsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Models\News;
use Flash;
use Response;

class NewsController extends AppBaseController
{
    /**
     * Display a listing of the News.
     *
     * @param NewsDataTable $newsDataTable
     *
     * @return Response
     */
    public function index(NewsDataTable $newsDataTable)
    {
        return $newsDataTable->render('admin.news.index');
    }

    /**
     * Show the form for creating a new News.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created News in storage.
     *
     * @param CreateNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $input = $request->all();

        $image = $request->file('image');
        $path = 'news/' . time() . rand() .  '.' . $image->extension();
        $image->storeAs('public/', $path);

        $input['image'] = 'storage/' . $path;

        /** @var News $news */
        $news = News::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/news.singular')]));

        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var News $news */
        $news = News::find($id);

        if (empty($news)) {
            Flash::error(__('models/news.singular').' '.__('messages.not_found'));

            return redirect(route('admin.news.index'));
        }

        return view('admin.news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var News $news */
        $news = News::find($id);

        if (empty($news)) {
            Flash::error(__('messages.not_found', ['model' => __('models/news.singular')]));

            return redirect(route('admin.news.index'));
        }

        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * Update the specified News in storage.
     *
     * @param int $id
     * @param UpdateNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsRequest $request)
    {
        /** @var News $news */
        $news = News::find($id);

        if (empty($news)) {
            Flash::error(__('messages.not_found', ['model' => __('models/news.singular')]));

            return redirect(route('admin.news.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = 'news/' . time() . rand() .  '.' . $image->extension();
            $image->storeAs('public/', $path);

            $input['image'] = 'storage/' . $path;
        }

        $news->fill($input);
        $news->save();

        Flash::success(__('messages.updated', ['model' => __('models/news.singular')]));

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var News $news */
        $news = News::find($id);

        if (empty($news)) {
            Flash::error(__('messages.not_found', ['model' => __('models/news.singular')]));

            return redirect(route('admin.news.index'));
        }

        $news->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/news.singular')]));

        return redirect(route('admin.news.index'));
    }

    public function homepageUpdate(News $news){

        $news->homepage = !$news->homepage;
        $news->save();

        return true;
    }
}
