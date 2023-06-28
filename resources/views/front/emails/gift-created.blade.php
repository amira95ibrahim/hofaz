<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text-consignee {
        color: black;
        font-size: 45px;
        position: absolute;
        top: -260px;
        right: 180px;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }


    .text-project {
        color: black;
        font-size: 45px;
        position: absolute;
        top: 225px;
        text-align: center;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }

    .text-sender {
        color: black;
        font-size: 45px;
        position: absolute;
        top: 320px;
        right: 155px;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }
</style>


<div class="image-container">
    <img src="{{asset('images/card/'.$consignee . '.jpg')}}" alt="Image">
    <div class="text-overlay">
        <p class="text-sender">{{$senderName}}</p>
        <p class="text-project">{{$project_name}}</p>
        <p class="text-consignee">{{$consignee}}</p>
    </div>
</div>
