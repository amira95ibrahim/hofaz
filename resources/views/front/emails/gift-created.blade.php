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
        color: rgb(0,102,133);
        font-size: 45px;
        position: absolute;
        top: 5%;
        left: 5%;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }

    .text-project {
        color: rgb(0,102,133);
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
        color: rgb(0,102,133);
        font-size: 45px;
        position: absolute;
        top: 85%;
        left: 5%;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }
</style>

<div class="image-container">
    <img src="{{asset('images/card/'.$consignee . '.jpg')}}" alt="Image" width="450px">
    {{-- <img src="{{ $imageUrl }}" alt="Generated Image" width="450px"> --}}
    <div class="text-overlay">{{ $imageUrl }}
        <p class="text-sender">{{$senderName}}</p>
        <p class="text-project">{{$project_name}}</p>
        <p class="text-consignee">{{$consignee}}</p>
    </div>
</div>
