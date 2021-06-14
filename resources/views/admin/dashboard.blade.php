@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
    p.title_thongke {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #fff;
    }
    </style>
    <div class="row">
        <p class="title_thongke">Thống kê đơn hàng doanh số</p>

        <form autocomplete="off">
            @csrf

            <div class="col-md-2">
                <p style="color:#fff">Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>

            </div>

            <div class="col-md-2">
                <p style="color:#fff">Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

            </div>

            <div class="col-md-2">
                <p style="color:#fff">
                    Lọc theo:
                    <select class="dashboard-filter form-control">
                        <option>--Chọn--</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng hiện tại</option>
                        <option value="365ngayqua">1 năm</option>
                    </select>
                </p>
            </div>

        </form>

        <!---////Biểu đồ--------->
        <div class="col-md-12">
            <div id="chart" style="height: 350px;"></div>
        </div>

    </div>


    <div class="row">

        <div class="col-md-4 col-xs-12">
            <br>
            <hr>
            </hr>
            <p class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</p>
            <div id="donut"></div>
        </div>

        <!--------------------------->

        <div class="col-md-4 col-xs-12">
            <br>
            <hr>
            </hr>
            <h3 style="color:#fff;">Bài viết xem nhiều</h3>

            <ol class="list_views">
                @foreach($post_views as $key => $post)
                <li>
                    <a target="_blank" href="{{url('/bai-viet/'.$post->post_slug)}}">{{$post->post_title}} | <span
                            style="color:red">{{$post->post_views}}</span></a>
                </li>
                @endforeach
            </ol>

        </div>

        <div class="col-md-4 col-xs-12">
            <style type="text/css">
            ol.list_views {
                margin: 10px 0;
                color: #fff;
            }

            ol.list_views a {
                color: #fff;
                font-weight: 500;
                font-size: 14px;
            }
            </style>
            <br>
            <hr>
            </hr>
            <h3 style="color:#fff;">Sản phẩm xem nhiều</h3>

            <ol class="list_views">
                @foreach($product_views as $key => $pro)
                <li>
                    <a target="_blank" href="{{url('/chi-tiet/'.$pro->product_slug)}}">{{$pro->product_name}} | <span
                            style="color:red">{{$pro->product_views}}</span></a>
                </li>
                @endforeach
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="md-col-12">
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

</div>

@endsection