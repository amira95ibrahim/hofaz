@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .text-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .text-consignee {
            color: rgb(0, 102, 133);
            font-size: 45px;
            position: absolute;
            top: 5%;
            left: 5%;
            white-space: nowrap;
            font-weight: bolder;
            overflow-wrap: break-word;
        }

        .text-project {
            color: rgb(0, 102, 133);
            font-size: 45px;
            position: absolute;
            top: 45%;
            left: 5%;
            text-align: center;
            white-space: nowrap;
            font-weight: bolder;
            overflow-wrap: break-word;
        }

        .text-sender {
            color: rgb(0, 102, 133);
            font-size: 45px;
            position: absolute;
            top: 85%;
            left: 5%;
            white-space: nowrap;
            font-weight: bolder;
            overflow-wrap: break-word;
        }

        .btnFullwidth {
            color: #fff;
            background-color: #F26522;
            border-color: #F26522;
        }
    </style>
@endpush

<div class="image-container">
    <img src="{{ asset('images/card/' . $consignee . '.jpg') }}" alt="Image" width="450px">
    {{-- <img src="{{ $imageUrl }}" alt="Generated Image" width="450px"> --}}
    <div class="text-overlay">
        <p class="text-sender">{{ $senderName }}</p>
        <p class="text-project">{{ $project_name }}</p>
        <p class="text-consignee">{{ $consignee }}</p>
    </div>
    <div>
        <form action="" method="POST">

        </form>
        <a href="{{ route('payment') }}" type="submit" id="pay"
            class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
    </div>

</div>

@push('scripts')
    <script>
        $('.btnFullwidth').click(function() {

            let price = $('input[name="amount"]').val();
            let model = 'iftar';
            let model_id = 0;
            console.log(price);
            if (price > 0) {
                sessionStorage.setItem('model', model);
                sessionStorage.setItem('model_id', model_id);
                sessionStorage.setItem('amount', price);

            } else {
                iziToast.error({
                    title: '{{ __('common.add_amount_first') }}',
                    position: 'topCenter'
                });
            }
        });
    </script>
@endpush
