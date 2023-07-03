<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();

        /** @var Sadaqah $sadaqah */
        $sadaqah = Category::create($input);

        Flash::success('تم الحفظ بنجاح');

        return redirect(route('admin.categories.index'));
    }

    public function edit($id)
    {
        /** @var Sadaqah $sadaqah */
        $category = Category::find($id);

        if (empty($category)) {

            Flash::error('القسم غير موجود');

            return redirect(route('admin.categories.index'));
        }

        return view('admin.category.edit')->with('category', $category);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);

        if (empty($category)) {

            Flash::error('القسم غير موجود');

            return redirect(route('admin.categories.index'));
        }

        $category->fill($request->all());

        $category->save();

        Flash::success('تم التعديل بنجاح');

        return redirect(route('admin.categories.index'));
    }

    public function changeStatus(Category $category){

        $category->active = !$category->active;
        $category->save();

        Flash::success('تم تعديل الحالة بنجاح');

        return redirect(route('admin.categories.index'));
    }
}
