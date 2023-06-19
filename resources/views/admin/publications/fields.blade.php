<div class="form-group col-sm-12">
    {!! Form::label('name_ar', 'عنوان الكتاب:') !!}
    @include('admin.components.nameInput')
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', 'الصورة:') !!}
    @include('admin.components.imageInput', ['image' => (isset($publication)) ? asset($publication->image) : null])
</div>

<!-- Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pdf', 'البروشور:') !!}
    {!! Form::file('pdf',  ['class' => 'form-control', 'accept' => 'application/pdf', 'onchange' => 'updatePreview(this, "pdf-preview")']) !!}

    <embed id="pdf-preview"
           src="{{ (!empty($publication)) ? asset($publication->pdf) : 'https://via.placeholder.com/400' }}"
           style="width: 100%; {{ (!empty($publication)) ? '' : 'display:none' }}"
           class="rounded rounded-circle" alt="placeholder" />
</div>

<div class="form-group col-sm-12">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', 'نشط:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
        {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
        <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
        <span class="switch-handle"></span>
    </label>
</div>


<div class="form-group col-sm-12">
    {!! Form::hidden('homepage', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('homepage', 'الصفحة الرئيسية:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
        {!! Form::checkbox('homepage', '1', null, ['class' => 'switch-input']) !!}
        <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
        <span class="switch-handle"></span>
    </label>
</div>

@push('page_scripts')
    <script>
        function updatePreview(input, target) {
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function () {
                let embed = document.getElementById(target);
                embed.parentElement.style.display = "block"
                // can also use "this.result"
                embed.src = reader.result;
            }
        }
    </script>
@endpush
