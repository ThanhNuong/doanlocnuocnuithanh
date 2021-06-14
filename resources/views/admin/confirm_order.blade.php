<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
    <div class="container" style=";border-radius: 12px;padding:15px;">
        <div class="col-md-12">

            <p style="text-align: center">Đây là email tự động. Quý khách vui lòng không trả lời email này.
            </p>
            <div class="row" style="padding: 15px">


                <div class="col-md-6" style="text-align: center;font-weight: bold;font-size: 30px">
                    <h4 style="margin:0">CỬA HÀNG LỌC NƯỚC NÚI THÀNH</h4>
                    <h6 style="margin:0">CHUYÊN MÁY LỌC NƯỚC KAROFI</h6>

                </div>

                <div class="col-md-6 logo">
                    <p>Chào bạn <strong
                            style="color: #000;text-decoration: underline;">{{$shipping_array['customer_name']}}</strong>,chúng
                        tôi đã xác nhận bạn đã đặt hàng ở công ty chúng tôi gồm những thông tin như sau:</p>
                </div>

                <div class="col-md-12">
                    <h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng : <strong
                            style="text-transform: uppercase;color:#fff">{{$code['order_code']}}</strong></p>
                    <p>Mã khuyến mãi áp dụng : <strong
                            style="text-transform: uppercase;color:#fff">{{$code['coupon_code']}}</strong></p>
                    <p>Phí ship hàng : <strong
                            style="text-transform: uppercase;color:#fff">{{$shipping_array['fee_ship']}}</strong></p>
                    <p>Dịch vụ : <strong style="text-transform: uppercase;color:#fff">Đặt hàng trực tuyến</strong></p>

                    <h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận hàng</h4>

                    <p>Email :
                        @if($shipping_array['shipping_email']=='')
                        <span style="color:#fff">Chưa có thông tin</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
                        @endif
                    </p>

                    <p>Họ tên người nhận :
                        @if($shipping_array['shipping_name']=='')
                        <span style="color:#fff">Chưa có thông tin</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
                        @endif
                    </p>
                    <p>Địa chỉ nhận hàng :
                        @if($shipping_array['shipping_address']=='')
                        <span style="color:#fff">Chưa có thông tin</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
                        @endif
                    </p>
                    <p>Số điện thoại :
                        @if($shipping_array['shipping_phone']=='')
                        <span style="color:#fff">Chưa có thông tin</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
                        @endif
                    </p>
                    <p>Ghi chú đơn hàng :
                        @if($shipping_array['shipping_notes']=='')
                        <span style="color:#fff">Chưa có thông tin</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
                        @endif
                    </p>
                    <p>Hình thức thanh toán : <strong style="text-transform: uppercase;color:#fff">
                            @if($shipping_array['shipping_method']==0)
                            Chuyển khoản ATM
                            @else
                            Tiền mặt
                            @endif

                        </strong></p>
                    <p style="color:#fff">Nếu không có thông tin người nhận cửa hàng sẽ liên hệ với người đặt hàng để
                        trao đổi thông tin về đơn hàng đã đặt.</p>


                    <table class="table table-striped" style="border:1px">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng đặt</th>
                                <th>Thành tiền</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $sub_total = 0;
                            $total = 0;
                            @endphp

                            @foreach($cart_array as $cart)

                            @php
                            $sub_total = $cart['product_qty']*$cart['product_price'];
                            $total+=$sub_total;
                            @endphp

                            <tr>
                                <td>{{$cart['product_name']}}</td>
                                <td>{{number_format($cart['product_price'],0,',','.')}}vnđ</td>
                                <td>{{$cart['product_qty']}}</td>
                                <td>{{number_format($sub_total,0,',','.')}}vnđ</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4" align="right">Tổng tiền thanh toán:
                                    {{number_format($total,0,',','.')}}vnđ</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <p style="color:#fff;text-align: center;font-size: 15px;">Mọi chi tiết xin liên hệ website tại cửa hàng</a>, hoặc liên hệ qua số hotline :
                    0935.4567.03. Xin cảm ơn quý khách đã đặt hàng tại cửa hàng chúng tôi.</p>

            </div>
        </div>
    </div>
</body>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

</html>