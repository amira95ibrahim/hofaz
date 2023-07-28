@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .text-overlay {
            position: absolute;
            top: 0;
            left: 0;
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
    </style>
@endpush

<div class="image-container">
    <img src="{{  $photoPath }}" alt="Image" width="450px">
  hiiiiiiiiiii
</div>

