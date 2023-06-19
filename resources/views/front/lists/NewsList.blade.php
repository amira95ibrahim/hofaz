<div class="section-content">
    <div class="row">
        @foreach($news as $article)
            <div class="col-xs-12 col-sm-6 col-md-4 float-right">
                <article class="post clearfix mb-sm-30 bg-silver-light border-1px">
                    <div class="entry-header">
                        <div class="post-thumb thumb">
                            <img src="{{ asset($article->image) }}" alt=""
                                 class="img-responsive img-fullwidth"/>
                        </div>
                        <div class="entry-meta media">
                            <div class="entry-date media-{{ $float }} text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                <ul>
                                    <li class="font-16 text-white font-weight-600 border-bottom">{{ \Carbon\Carbon::createFromDate($article->publishing_date)->format('d') }}</li>
                                    <li class="font-12 text-white text-uppercase">{{ \Carbon\Carbon::createFromDate($article->publishing_date)->translatedFormat('M') }}</li>
                                </ul>
                            </div>
                            <div class="media-body pl-20">
                                <div class="event-content">
                                    <h4 class="entry-title font-22 mb-5"><a
                                            href="#">{{ $article->name }}</a></h4>
                                    <span class="mb-10 mr-10"><i
                                            class="fa fa-calendar mr-5 text-theme-colored"></i> {{ $article->publishing_date }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-content">
{{--                        <p>{{ $article->description }}</p>--}}
                        <p>{{ mb_substr($article->description, 0, 200,'utf-8') . ' ...' }}</p>
                        <a href="#"
                           class="btn btn-default btn-sm btn-theme-colored mt-10">@lang('index.read_more')</a>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>
