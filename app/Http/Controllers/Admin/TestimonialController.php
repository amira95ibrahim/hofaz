<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TestimonialDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Flash;
use Response;

class TestimonialController extends AppBaseController
{
    /**
     * Display a listing of the Testimonial.
     *
     * @param TestimonialDataTable $testimonialDataTable
     *
     * @return Response
     */
    public function index(TestimonialDataTable $testimonialDataTable)
    {
        return $testimonialDataTable->render('admin.testimonials.index');
    }

    /**
     * Show the form for creating a new Testimonial.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created Testimonial in storage.
     *
     * @param CreateTestimonialRequest $request
     *
     * @return Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();

        $image = $request->file('image');
        $path = 'testimonial/' . time() . rand() .  '.' . $image->extension();
        $image->storeAs('public/', $path);

        $input['image'] = 'storage/' . $path;

        /** @var Testimonial $testimonial */
        $testimonial = Testimonial::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/testimonials.singular')]));

        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Display the specified Testimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Testimonial $testimonial */
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Flash::error(__('models/testimonials.singular').' '.__('messages.not_found'));

            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.show')->with('testimonial', $testimonial);
    }

    /**
     * Show the form for editing the specified Testimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Testimonial $testimonial */
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testimonials.singular')]));

            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.edit')->with('testimonial', $testimonial);
    }

    /**
     * Update the specified Testimonial in storage.
     *
     * @param int $id
     * @param UpdateTestimonialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestimonialRequest $request)
    {
        /** @var Testimonial $testimonial */
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testimonials.singular')]));

            return redirect(route('admin.testimonials.index'));
        }

        $testimonial->fill($request->all());
        $testimonial->save();

        Flash::success(__('messages.updated', ['model' => __('models/testimonials.singular')]));

        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Remove the specified Testimonial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Testimonial $testimonial */
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testimonials.singular')]));

            return redirect(route('admin.testimonials.index'));
        }

        $testimonial->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/testimonials.singular')]));

        return redirect(route('admin.testimonials.index'));
    }
}
