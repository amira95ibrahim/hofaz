@extends('front.layout.main')

@push('styles')
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio]+img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked+img {
            outline: 2px solid #F26522;
        }

        .owl-carousel .owl-item img {
            height: 200px;
        }

        h4 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('gift.gift')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.gift')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h3>@lang('gift.choose_gift')</h3>
                        <div class="owl-carousel">
                            @foreach ($gifts as $gift)


                                <div class="item">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ asset($gift->giftable->image) }}">
                                        </div>
                                        <div class="card-body text-center">
                                            <h4>{{ $gift->giftable->name }}</h4>
                                            <form id="gift-form" action="{{ route('payment') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="project_name"
                                                    value="{{ $gift->giftable->name_ar }}" class="required">
                                                <input type="text" name="donate" class="form-control br-20 required"
                                                    value="{{ $gift->giftable->initial_amount }}">
                                                {{--        <input type="text" name="donate" class="form-control br-20" value="10"> --}}
                                                <button type="button" id="{{ $gift->id }}"
                                                    class="btn btn-default mt-1 btn-xl btn-theme-colored btn-flat mr-5 selectProject"
                                                    data-project-name="{{ $gift->giftable->name_ar }}">@lang('gift.donate_your_gift')</button>  <button type="button" style="display: none"
                                                    class="btn btn-dark mt-1 btn-xl btn-theme-colored btn-flat mr-5"
                                                    disabled><i class="fa fa-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>

            <div class="container">
                <div class="row">
                    <input type="hidden" name="selectedCard" id="selectedCard">

                    <div class="col-md-4 text-center">
                        <label>
                            <input type="radio" name="card" value="card1" required>
                            <img src="{{ asset('images/causes/card1.jpg') }}">
                        </label>
                    </div>
                    <div class="col-md-4 text-center">
                        <label>
                            <input type="radio" name="card" value="card2" required>
                            <img src="{{ asset('images/causes/card2.jpg') }}">
                        </label>
                    </div>
                    <div class="col-md-4 text-center">
                        <label>
                            <input type="radio" name="card" value="card3" required>
                            <img src="{{ asset('images/causes/card3.jpg') }}">
                        </label>
                    </div>
                </div>
                @if ($errors->has('card'))
                    <span class="text-danger">{{ $errors->first('card') }}</span>
                @endif
            </div>

        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-grey p-3">

                            <div class="form-group">
                                <label>@lang('gift.sender_name')</label>
                                <input type="text" class="form-control br-20" name="sender"
                                    placeholder="@lang('gift.enter_sender_name')">
                                @if ($errors->has('sender'))
                                    <span class="text-danger">{{ $errors->first('sender') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>@lang('gift.consignee')</label>
                                <input type="text" class="form-control br-20" name="consignee"
                                    placeholder="@lang('gift.enter_consignee_name')">
                                @if ($errors->has('consignee'))
                                    <span class="text-danger">{{ $errors->first('consignee') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>@lang('gift.email')</label>
                                <input type="email" class="form-control br-20" name="email"
                                    placeholder="@lang('gift.enter_email_address')">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>@lang('gift.phone_number')</label>
                                <input type="phone" class="form-control br-20" name="phone"
                                    placeholder="@lang('gift.enter_phone_number')">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <input type="hidden" name="gift">
                            <input type="hidden" name="amount">
                            <input type="hidden" name="project_name" value="{{ $gift->giftable->name_ar }}">
<div class="flex">

                               <a href="{{ route('payment') }}"  id="pay" style="margin-right: 25px"
                                class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('gift.donate_now')</a>
                                <button  type="submit"
                                class="btn btn-dark  btn-xl btn-theme-colored btn-flat mr-5 preview">@lang('gift.preview')</button>
                                {{-- <a href="#" type="submit" id="preview" onclick="openGiftCreatedPopup()"
                                class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 ">@lang('gift.preview')</a> --}}
</div>  </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            arrow: false,
            rtl: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.selectProject').on('click', function() {
            $('input[name="amount"]').val($(this).prev().val());
            $('input[name="gift"]').val($(this).attr('id'));

            let allGifts = $('.selectProject');
            allGifts.show();
            allGifts.next().hide();

            $(this).hide();
            $(this).next().show();
        });
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('gift-form').addEventListener('submit', async (event) => {
        // ...rest of your code...
        console.log('hi');
    });
});
    </script>
    <script>

        //    function openGiftCreatedPopup() {
        // document.getElementById('gift-form').addEventListener('submit', async (event) => {
        //     event.preventDefault(); // Prevent the default form submission
        //     console.log('hi');
        //     const form = event.target;
        //     const formData = new FormData(form);

        //     try {
        //         const response = await fetch('{{ route('generate') }}', {
        //             method: 'POST',
        //             body: formData,
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             },
        //         });

        //         if (response.ok) {
        //             // openGiftCreatedPopup();
        //      window.open('/gift-created-popup', 'Gift Created', 'width=450,height=650');

        //         } else {
        //             // Handle any errors returned by the server
        //             const data = await response.json();
        //             console.error('Error:', data);
        //         }
        //     } catch (error) {
        //         // Handle any network or fetch errors
        //         console.error('Fetch Error:', error);
        //     }
        // });

        // }



    </script>
    <script>
        const radioButtons = document.querySelectorAll('input[name="card"]');
        const selectedCardInput = document.getElementById('selectedCard');

        radioButtons.forEach((radioButton) => {
          radioButton.addEventListener('change', () => {
            selectedCardInput.value = radioButton.value;
          });
        });
      </script>
<script>
$(document).ready(function() {
  // Add an event listener to the gift card buttons
  $('.selectProject').click(function() {
    // Get the name of the selected project from the data attribute
    let projectName = $(this).data('project-name');
    // Update the value of the project_name input field
    $('input[name="project_name"]').val(projectName);
  });

  // Rest of your code...
});
</script>

    <script>
        $(document).ready(function(){
        $('.preview').click(function() {

            let sender = $('input[name="sender"]').val();
            let reciever = $('input[name="consignee"]').val();
            let phone = $('input[name="phone"]').val();
            let email = $('input[name="email"]').val();
            let project_name = $('input[name="project_name"]').val();
            let card = selectedCardInput.value;

            let price = $('input[name="amount"]').val();
            let model = 'gift';
            let model_id = 8;


              console.log(project_name);
            if (price > 0) {
                sessionStorage.setItem('model', model);
                sessionStorage.setItem('model_id', model_id);
                sessionStorage.setItem('amount', price);
                sessionStorage.setItem('sender', sender);
                sessionStorage.setItem('reciever', reciever);
                sessionStorage.setItem('phone', phone);
                sessionStorage.setItem('card', card);
                sessionStorage.setItem('email', email);
                sessionStorage.setItem('project_name', project_name);


                $.ajax({
          url: '/gift/generate', // Replace this with your backend endpoint
          method: 'POST', // Use the appropriate HTTP method (POST, GET, etc.)
          data: {
            _token: '{{ csrf_token() }}', // Include the CSRF token if needed
            sender: sender,
            reciever: reciever,
            phone: phone,
            email: email,
            card: card,
            project_name:project_name,
            // Add any other data you want to send to the server
          },
          success: function(response) {
            // Handle the response from the server if needed
            console.log('Data sent successfully:', response);
            window.open('/gift-created-popup', 'Gift Created', 'width=450,height=550');

          },
          error: function(error) {
            // Handle any errors that occurred during the AJAX request
            console.error('Error sending data:', error);
          }
        });



            }
            else {
                iziToast.error({
                    title: '{{ __('common.add_amount_first') }}',
                    position: 'topCenter'
                });
            }
            });
        })
    </script>
@endpush
