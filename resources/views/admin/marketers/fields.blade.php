

    <div class="col-sm-12">
        <div class="card card-warning">
            <div class="card-header">
                <h4>بيانات المندوب</h4>

            </div>
            <div class="card-block collapse in" id="collapseExample2">
                <div class="row">

                    <div class="form-group col-sm-12">
                        {!! Form::label('name_ar', 'اسم المندوب:') !!}
                        @include('admin.components.nameInput')
                    </div>
                    <!-- Initial Amount Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('phone', '  تليفون:') !!}
                        <div class="input-group">
                            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                        </div>
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

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">اختر المشروع</label>
                        <select  class="form-control" id="project_ids" name="project_ids[]">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ isset($project) && $project->id == $project->id ? 'selected' : '' }}>
                                    {{ $project->{'name_'.app()->getLocale()} }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                      <form>
                        <!-- Other form fields for creating the marketer -->
                        {{-- <div class="form-group">
                            <label for="project_ids">المشاريع المرتبطة:</label>
                            <select multiple class="form-control" id="project_ids" name="project_ids[]">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->{'name_'.app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        {{-- <button type="submit" class="btn btn-primary">إنشاء</button> --}}
                    {{-- </form> --}}

                </div>
            </div>
        </div>
    </div>
</div>

</div>

@push('page_scripts')

@endpush

