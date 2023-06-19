@push('page_css')
    <link href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endpush

<select name="field_id[]" class="form-control" required id="kafala-field-select" multiple="multiple">
    <option disabled value="">اختر الحقول</option>
    @foreach($fields as $field)
        <option value="{{ $field['id'] }}" {{ (isset($selectedFields) && in_array($field['id'], $selectedFields)) ? 'selected' : '' }}>{{ $field['name'] }}</option>
    @endforeach
</select>

@push('page_scripts')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kafala-field-select').select2();
            $('.select2-container').css('width', '100%');
        });
    </script>
@endpush
