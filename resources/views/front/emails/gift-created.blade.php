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
        color: rgb(0,102,133);
        font-size: 45px;
        position: absolute;
        top: -190px;
        left: -21px;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }


    .text-project {
        color: rgb(0,102,133);
        font-size: 45px;
        position: absolute;
        top: 225px;
        left:-50px;
        text-align: center;
        white-space: nowrap;
        font-weight: bolder;
        overflow-wrap: break-word;
    }

    .text-sender {
        color: rgb(0,102,133);
        font-size: 45px;
        position: absolute;
        top: 390px;
        left:-25px;
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
