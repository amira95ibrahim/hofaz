<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'الصورة:') !!}
{{--    {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
    @include('admin.components.imageInput', ['image' => (isset($homepageSlider)) ? asset($homepageSlider->image) : null])
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'الرابط:') !!}
    <div class="input-group">
    <span class="input-group-btn">
         <button type="button" class="btn btn-primary" onclick="openLink()"><i class="icon-link"></i> فتح الرابط</button>
    </span>
        {!! Form::text('link', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', 'نشط:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
   {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
   <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
   <span class="switch-handle"></span>
    </label>
</div>

<script>
    function openLink(){
        let url = $('input[name="link"]').val();
        if(url){
            window.open(url, "_blank");
        }
    }
</script>
