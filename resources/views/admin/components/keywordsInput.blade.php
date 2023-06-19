@push('page_css')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
{{--    <link rel="stylesheet" href="{{ asset('vendor/tagify/tagify.css') }}">--}}
    <style>
        /*.ui-tabs-vertical { width: 55em; }*/
        .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: right; width: 20%; }
        .ui-tabs-vertical .ui-tabs-nav li { clear: right; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
        .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
        .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
        .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 80%;}
    </style>
@endpush

<div id="keywordsTabs">
    <ul>
        <li><a href="#keywords-ar">ar<img src="{{ asset('images/kuwait.png') }}" alt="kw" style="margin-right: 5px;"></a></li>
        <li><a href="#keywords-en">en<img src="{{ asset('images/united-kingdom.png') }}" alt="en" style="margin-right: 5px;"></a></li>
    </ul>
    <div id="keywords-ar">
        {!! Form::textarea('keywords_ar', null, ['class' => 'form-control', 'placeholder' => 'عربي', ]) !!}
    </div>
    <div id="keywords-en">
        {!! Form::textarea('keywords_en', null, ['class' => 'form-control', 'placeholder' => 'انجليزي']) !!}
    </div>
</div>

@push('page_scripts')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
{{--    <script src="{{ asset('vendor/tagify/jQuery.tagify.min.js') }}"></script>--}}
    <script>
        $( function() {
            $("#keywordsTabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
            $("#keywordsTabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
        } );
        // // The DOM element you wish to replace with Tagify
        // var input = document.querySelector('input[name=keywords_ar]');
        //
        // // initialize Tagify on the above input node reference
        // new Tagify(input)
        //
        // // The DOM element you wish to replace with Tagify
        // var input = document.querySelector('input[name=keywords_en]');
        //
        // // initialize Tagify on the above input node reference
        // new Tagify(input)
    </script>
@endpush
