@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->

    <h2 class="title text-center">Liên hệ với chúng tôi</h2>
    <div class="row">
        @foreach($contact as $key => $cont)
        <div class="col-md-12">
            {!!$cont->info_contact!!}

        </div>
        <div class="col-md-12">
            <h4>Bản đồ</h4>
            {!!$cont->info_map!!}
        </div>
    </div>
    @endforeach

    <div>

        <style type="text/css">
        .input_call {
            color: #000;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        </style>


        <h3>Hãy gọi video với chúng tôi theo các bước sau:</h3>
        <p class="input_call">Bước 1: Hãy chọn connect sẽ cho ra một mã trong box bên cạnh</p>
        <p class="input_call">Bước 2: Sau đó coppy mã đó và vào tin nhắn gửi mã đó cho cửa hàng</p>
        <p class="input_call">Bước 3: Nhân viên bên cửa hàng sẽ nhận và gửi lại cho bạn một mã tương tự như trên. Bạn
            hãy coppy mã đó và dán vào box tiếp theo và click vào connect</p>
        <p class="input_call">Bước 4: Hãy đợi và nhân viên sẽ gọi và trao đổi với bạn</p>

        <!-- <button class="call">Call</button>
        <input type="text" class="signal-offer">
        <button class="contect-offer">Connect</button>
        <input type="text" class="signal-answer">
        <button class="contect-answer">Connect</button>
        <video class="my-video" muted="muted" autoplay></video>
        <video class="video" autoplay></video> -->


        <h1 class="title">Delta Meet</h1>
        <p id="notification" hidden></p>
        <div class="entry-modal" id="entry-modal">
            <p>Create or Join Meeting</p>
            <input id="room-input" class="room-input" placeholder="Enter Room ID">
            <div>
                <button onclick="createRoom()">Create Room</button>
                <button onclick="joinRoom()">Join Room</button>
            </div>
        </div>
        <div class="meet-area">
            <!-- Remote Video Element-->
            <video id="remote-video"></video>

            <!-- Local Video Element-->
            <video id="local-video"></video>
        </div>

    </div>


</div>
<!--features_items-->
<!--features_items-->
<!-- Call video -->


@endsection