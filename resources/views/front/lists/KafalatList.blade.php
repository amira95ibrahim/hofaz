@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/share.css') }}">
@endpush

<div class="row">
    @foreach($kafalat as $kafalah)
        <div class="col-sm-3 mt-2">
            <div class="circle-sponsor text-center">
                <img src="{{ asset($kafalah->image) }}" class="img-fluid">
                <a href="{{ route('sponsorDetail', $kafalah->id) }}" class="text-orange">{{ $kafalah->name }}</a>
                <div class="sponsor-share-btn mt-1">
                    <a href="{{ route('sponsorDetail', $kafalah->id) }}"
                       class="btn btn-success border-0 button-sponsor btn-lg">@lang('kafala.sponsor_me')
                        <i class="ri-heart-fill red-icon"></i></a>
                    <!-- <a href="#" class="btn btn-success border-0 button-sponsor btn-lg"><i class="ri-share-fill"></i></a> -->
                    <div class="share-button sharer">
                        <button type="button"
                                class="btn btn-success border-0 button-sponsor share-btn">
                            <i class="ri-share-fill"></i></button>
                        <div class="social top center networks-5 ">
                            <!-- Facebook Share Button -->
                            <a class="fbtn share facebook"
                               href="https://www.facebook.com/sharer/sharer.php?u=url"><i
                                    class="fa fa-facebook"></i></a>
                            <!-- Google Plus Share Button -->
                            <a class="fbtn share gplus"
                               href="https://plus.google.com/share?url=url"><i
                                    class="fa fa-google-plus"></i></a>
                            <!-- Twitter Share Button -->
                            <a class="fbtn share twitter"
                               href="https://twitter.com/intent/tweet?text=title&amp;url=url&amp;via=creativedevs"><i
                                    class="fa fa-twitter"></i></a>
                            <!-- Pinterest Share Button -->
                            <a class="fbtn share pinterest"
                               href="https://pinterest.com/pin/create/button/?url=url&amp;description=data&amp;media=image"><i
                                    class="fa fa-pinterest"></i></a>
                            <!-- LinkedIn Share Button -->
                            <a class="fbtn share linkedin"
                               href="https://www.linkedin.com/shareArticle?mini=true&amp;url=url&amp;title=title&amp;source=url/"><i
                                    class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            //custom button for homepage
            $(".share-btn").click(function (e) {
                $('.networks-5').not($(this).next(".networks-5")).each(function () {
                    $(this).removeClass("active");
                });

                $(this).next(".networks-5").toggleClass("active");
            });
        });
    </script>
@endpush
