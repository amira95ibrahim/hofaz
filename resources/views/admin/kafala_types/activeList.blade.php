@push('page_css')
    <link href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endpush

<select name="type_id" class="form-control" required id="kafala-type-select">
    <option disabled selected value="">اختر النوع</option>
    @foreach($types as $type)
        <option value="{{ $type['id'] }}" {{ (isset($selectedType) && $selectedType == $type['id']) ? 'selected' : '' }}>{{ $type['name'] }}</option>
    @endforeach
</select>

@push('page_scripts')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kafala-type-select').select2();
            $('.select2-container').css('width', '100%');
        });

        $('#kafala-type-select').change(function () {
            console.log('changed');
            $('.fields').fadeOut(300, function() { $(this).remove(); });
            var url = '{{ url('admin/kafala-type/fields') }}/' + $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'get',
                url: url,
                data: {},
            }).done(function (data) {
                console.log(data);
                var content = '';
                var input = '';
                data.forEach(function (item){
                    switch (item.datatype) {
                        case 'text':
                            input = "<input type='text' class='form-control' id='field_" + item.id + "' name='fields[" + item.id + "]' required=" + item.mandatory + ">";
                            break;
                        case 'number':
                            input = "<input type='number' class='form-control' id='field_" + item.id + "' name='fields[" + item.id + "]' required=" + item.mandatory + ">";
                            break;
                        case 'date':
                            input = "<input type='date' class='form-control' id='field_" + item.id + "' name='fields[" + item.id + "]' required=" + item.mandatory + ">";
                            break;
                        case 'select':
                            const obj = JSON.parse(item.select_options);
                            input = "<select class='form-control' id='field_" + item.id + "' name='fields[" + item.id + "]' required=" + item.mandatory + ">";
                            input += "<option value=''>اختر " + item.name + "</option>";
                            obj.forEach(function (option){
                                input += "<option value='" + option.value + "'>" + option.value + "</option>";
                            });
                            input += "</select>";
                            break;
                    }
                    content += '<div class="form-group col-sm-12 fields"><label for="' + item.name + '">' + item.name + '</label>' + input + '</div>';
                });
                $('.appendBefore').before(content);

                let kafalaValues = $('#kafalaValues');

                if(kafalaValues.length > 0){
                    let data = JSON.parse(kafalaValues.val());
                    console.log('data');
                    console.log(data);
                    data.forEach(function (option){
                        $('#field_' + option.id).val(option.pivot.value_ar);

                    });
                }
            });
        });

        let changeEvent = new Event('change');
        document.getElementById('kafala-type-select').dispatchEvent(changeEvent);
    </script>
@endpush
