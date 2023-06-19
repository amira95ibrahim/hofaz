@push('page_css')
    <link rel="stylesheet" href="{{ asset('vendor/tagify/tagify.css') }}">
@endpush
{{--<!-- Name En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_en', 'اسم الحقل') !!}--}}
{{--    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Name Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_ar', __('models/kafalaFields.fields.name_ar').':') !!}--}}
{{--    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'اسم الحقل:') !!}
    @include('admin.components.nameInput')
</div>

<div class="form-group col-sm-12"></div>

@if((isset($kafalaFields) && !$kafalaFields->kafalatValues()->count()) || !isset($kafalaFields))
<!-- Datatype Field -->
<div class="form-group {{ (isset($kafalaFields) && $kafalaFields->datatype == 'select') ? 'col-sm-3' : 'col-sm-6' }}"
     id="selectInput">
    {!! Form::label('datatype', 'نوع الحقل:') !!}
    <select name="datatype" class="form-control" required>
        <option value="" selected disabled>اختر نوع الحقل</option>
        @foreach(\App\Models\KafalaField::datatypeEnum as $datatype)
            <option
                value="{{ $datatype }}" {{ (isset($kafalaFields) && $kafalaFields->datatype == $datatype) ? 'selected' : '' }}>{{ $datatype }}</option>
        @endforeach
    </select>
</div>
@endif

<div class="form-group col-sm-3"
     style="{{ (isset($kafalaFields) && $kafalaFields->datatype == 'select') ? '' : 'display: none' }}" id="selectTags">
    {!! Form::label('select_options', 'خيارات الحقل:') !!}
    {!! Form::text('select_options', null,  ['class' => 'form-control', 'placeholder' => 'اضغط Enter بعد كل اختيار للفصل بينهم']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', 'نشط:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
        {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
        <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
        <span class="switch-handle"></span>
    </label>
</div>

<!-- Mandatory Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('mandatory', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('mandatory', 'مطلوب:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
        {!! Form::checkbox('mandatory', '1', null, ['class' => 'switch-input']) !!}
        <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
        <span class="switch-handle"></span>
    </label>
</div>

@push('page_scripts')
    <script>
        // if IE, add IE tagify's polyfills
        !function (d) {
            if (!d.currentScript) {
                var s = d.createElement('script');
                s.src = '{{ asset('vendor/tagify/tagify.polyfills.min.js') }}';
                d.head.appendChild(s);
            }
        }(document)
    </script>
    <script src="{{ asset('vendor/tagify/jQuery.tagify.min.js') }}"></script>
    <script>
        $('select[name=datatype]').change(function () {
            let selectInput = $('#selectInput');
            if ($(this).val() === 'select') {
                selectInput.toggleClass('col-sm-6 col-sm-3');
                $('#selectTags').show();
            } else {
                $('#selectTags').hide();
                if (selectInput.hasClass('col-sm-3')) {
                    selectInput.toggleClass('col-sm-6 col-sm-3');
                }
            }
        });
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=select_options]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
@endpush
