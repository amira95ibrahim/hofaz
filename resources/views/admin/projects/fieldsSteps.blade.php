@push('page_css')
    <link href="{{ asset('css/jquery-steps.css') }}" rel="stylesheet" />
@endpush
<h6>@lang('models/projects.basic_data')</h6>
<section>
{{--    <!-- Name En Field -->--}}
{{--    <div class="form-group col-sm-6">--}}
{{--        <div class="form-group col-sm-6"><div class="form-group col-sm-6">--}}
{{--        {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--    </div>--}}

{{--    <!-- Name Ar Field -->--}}
{{--    <div class="form-group col-sm-6">--}}
{{--        {!! Form::label('name_ar', __('models/projects.fields.name_ar').':') !!}--}}
{{--        {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--    </div>--}}

    <div class="form-group col-sm-6">
        {!! Form::label('name_ar', __('models/projects.fields.name_ar').':') !!}
        @include('admin.components.nameInput')
    </div>

{{--    <!-- Description En Field -->--}}
{{--    <div class="form-group col-sm-6">--}}
{{--    {!! Form::label('description_en', __('models/projects.fields.description_en').':') !!}--}}
{{--    {!! Form::text('description_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--    </div>--}}

{{--    <!-- Description Ar Field -->--}}
{{--    <div class="form-group col-sm-6">--}}
{{--    {!! Form::label('description_ar', __('models/projects.fields.description_ar').':') !!}--}}
{{--    {!! Form::text('description_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--    </div>--}}

    <div class="form-group col-sm-6">
        {!! Form::label('description_ar', __('models/projects.fields.description_ar').':') !!}
        @include('admin.components.descriptionInput')
    </div>
</section>

<h6>@lang('models/projects.basic_data')</h6>
<section>
    <!-- Country Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('country_id', __('models/projects.fields.country_id').':') !!}
        @include('admin.countries.activeList', ['selectedCountry' => (isset($project)) ? $project->country_id : null])
    </div>

    <!-- Cost Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cost', __('models/projects.fields.cost').':') !!}
        <div class="input-group">
            {!! Form::number('cost', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon">@lang('admin/common.currency')</span>
        </div>
    </div>

    <!-- Paid Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('paid', __('models/projects.fields.paid').':') !!}
        <div class="input-group">
            {!! Form::number('paid', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon">@lang('admin/common.currency')</span>
        </div>
    </div>

    <!-- Initial Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('initial_amount', __('models/projects.fields.initial_amount').':') !!}
        <div class="input-group">
            {!! Form::number('initial_amount', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon">@lang('admin/common.currency')</span>
        </div>
    </div>

    <!-- Show Remaining Field -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('show_remaining', 0, ['class' => 'form-check-input']) !!}
        {!! Form::label('show_remaining', __('models/projects.fields.show_remaining').':') !!}
        <label class="switch switch-icon switch-primary-outline-alt">
            {!! Form::checkbox('show_remaining', '1', null, ['class' => 'switch-input']) !!}
            <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
            <span class="switch-handle"></span>
        </label>
    </div>


    <!-- Active Field -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::label('active', __('models/projects.fields.active').':') !!}
        <label class="switch switch-icon switch-primary-outline-alt">
            {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
            <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
            <span class="switch-handle"></span>
        </label>
    </div>
    
      <!-- show in home  -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('homepage', 0, ['class' => 'form-check-input']) !!}
        {!! Form::label('homepage', __('models/projects.fields.homepage').':') !!}
        <label class="switch switch-icon switch-primary-outline-alt">
            {!! Form::checkbox('homepage', '1', null, ['class' => 'switch-input']) !!}
            <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
            <span class="switch-handle"></span>
        </label>
    </div>

</section>

<h6>@lang('models/projects.image')</h6>
<section>
    <!-- Image Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('image', __('models/projects.fields.image').':') !!}
{{--        {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
        @include('admin.components.imageInput', ['image' => (isset($project)) ? asset($project->image) : null])
    </div>
</section>

@push('page_scripts')
    <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script>
        var form = $("#projectForm");
        form.steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#'
        });
    </script>
@endpush

