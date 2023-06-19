@push('page_css')
    <link href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endpush

<select name="{{ (!empty($disable_multiselect)) ? 'country_id' : 'country_id[]' }}" class="form-control" required id="country-select" {{ (!empty($disable_multiselect)) ? '' : 'multiple=multiple' }}>
    <option disabled {{ (!empty($disable_multiselect)) ? 'selected' : '' }} value="">اختر الدولة</option>
    @foreach($countries as $country)
        <option value="{{ $country['id'] }}" {{ ($selectedCountry && $selectedCountry == $country['id']) ? 'selected' : '' }}>{{ $country['name'] }}</option>
    @endforeach
</select>

@push('page_scripts')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#country-select').select2();
            $('.select2-container').css('width', '100%');
        });
    </script>
@endpush
