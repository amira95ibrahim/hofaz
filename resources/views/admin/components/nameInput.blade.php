@push('page_css')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
    <style>
        /*.ui-tabs-vertical { width: 55em; }*/
        .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: right; width: 20%; }
        .ui-tabs-vertical .ui-tabs-nav li { clear: right; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
        .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
        .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
        .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 80%;}
    </style>
@endpush

<div id="nameTabs">
    <ul>
        <li><a href="#name-ar">ar<img src="{{ asset('images/kuwait.png') }}" alt="kw" style="margin-right: 5px;"></a></li>
        <li><a href="#name-en">en<img src="{{ asset('images/united-kingdom.png') }}" alt="en" style="margin-right: 5px;"></a></li>
    </ul>
    <div id="name-ar">
        {!! Form::text('name_ar', null, ['class' => 'form-control', 'maxlength' => 255, 'placeholder' => 'عربي']) !!}
    </div>
    <div id="name-en">
        {!! Form::text('name_en', null, ['class' => 'form-control', 'maxlength' => 255, 'placeholder' => 'انجليزي']) !!}
    </div>
</div>

@push('page_scripts')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $( function() {
            $("#nameTabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
            $("#nameTabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
        } );
    </script>
@endpush
