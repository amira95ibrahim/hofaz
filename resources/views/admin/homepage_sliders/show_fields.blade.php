<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/homepageSliders.fields.image').':') !!}
    <p>{{ $homepageSlider->image }}</p>
</div>

<!-- Link Field -->
<div class="col-sm-12">
    {!! Form::label('link', __('models/homepageSliders.fields.link').':') !!}
    <p>{{ $homepageSlider->link }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/homepageSliders.fields.active').':') !!}
    <p>{{ $homepageSlider->active }}</p>
</div>

