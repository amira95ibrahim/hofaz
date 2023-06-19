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

<div id="testimonialTabs">
    <ul>
        <li><a href="#testimonial-ar">ar<img src="{{ asset('images/kuwait.png') }}" alt="kw" style="margin-right: 5px;"></a></li>
        <li><a href="#testimonial-en">en<img src="{{ asset('images/united-kingdom.png') }}" alt="en" style="margin-right: 5px;"></a></li>
    </ul>
    <div id="testimonial-ar">
        {!! Form::textarea('testimonial_ar', null, ['class' => 'form-control', 'placeholder' => 'عربي']) !!}
    </div>
    <div id="testimonial-en">
        {!! Form::textarea('testimonial_en', null, ['class' => 'form-control', 'placeholder' => 'انجليزي']) !!}
    </div>
</div>

@push('page_scripts')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $( function() {
            $("#testimonialTabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
            $("#testimonialTabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
        } );
    </script>
@endpush
