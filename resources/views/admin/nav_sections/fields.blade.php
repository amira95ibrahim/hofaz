<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', __('models/navSections.fields.name_en').':') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ar', __('models/navSections.fields.name_ar').':') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', __('models/navSections.fields.active').':') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
   {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
   <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
   <span class="switch-handle"></span>
    </label>
</div>
