@inject('projectService', 'App\Services\ProjectService')
@push('page_css')
    <link href="{{ asset('backend/css/multi-select.css') }}" rel="stylesheet" />
@endpush

<div class="row">
    <div class="col-sm-6" ><label for="gift_select">مشاريع هدية:</label></div>
    <div class="col-sm-6" style="padding-right: 5%"><label for="gift_select">كل المشاريع:</label></div>
</div>
<select multiple="multiple" id="gift-select" name="gift_select[]">
    @foreach($projectService::getAllActiveProjects() as $activeProject)
        <option value='{{ $activeProject->model . '_' . $activeProject->id }}'
                {{ (in_array($activeProject->model . '_' . $activeProject->id,  $gifts)) ? 'selected' : '' }} data-model="{{ $activeProject->model }}">
            {{ $activeProject->name . ' => ' . $activeProject->country->name }}
        </option>
    @endforeach
</select>

@push('page_scripts')
    <script src="{{ asset('backend/js/jquery.quicksearch.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.multi-select.js') }}"></script>
    <script>
        $('#gift-select').multiSelect({
            keepOrder: true,
            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ابحث'>",
            selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ابحث'>",
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                        if (e.which === 40){
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                        if (e.which == 40){
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    </script>
@endpush
