<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xác nhận đơn đặt hàng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="padding:15px;">
		<div class="col-md-12" >

			<p style="font-style: italic;">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
			<div class="row" style=";padding: 15px">

				
				<div class="col-md-6" style="text-align: center;font-weight: bold;font-size: 30px">
					<h4 style="margin:0">CỬA HÀNG LỌC NƯỚC NÚI THÀNH</h4>
					<h6 style="margin:0">CHUYÊN MÁY LỌC NƯỚC KAROFI</h5>
				</div>

				<div class="col-md-6 logo">
					<p>Khách hàng <strong style="text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
				</div>
				
				<div class="col-md-12">
					<h4 style="text-transform: uppercase;">Thông tin đơn hàng</h4>
					<p>Mã đơn hàng : <strong style="text-transform: uppercase;">{{$code['order_code']}}</strong></p>
					<p>Mã khuyến mãi: <strong style="text-transform: uppercase;">{{$code['coupon_code']}}</strong></p>
					<p>Phí giao hàng : <strong style="text-transform: uppercase;">{{$shipping_array['fee']}}</strong></p>
					<p>Dịch vụ : <strong style="text-transform: uppercase;">Đặt hàng trực tuyến</strong></p>
					
					<h4 style="text-transform: uppercase;">Thông tin người nhận</h4>

					<p>Email : 
						@if($shipping_array['shipping_email']=='')
							<span >Chưa có thông tin</span>
						@else
							<span >{{$shipping_array['shipping_email']}}</span>
						@endif
					</p>

					<p>Họ và tên người nhận : 
						@if($shipping_array['shipping_name']=='')
							<span >Chưa có thông tin</span>
						@else
							<span >{{$shipping_array['shipping_name']}}</span>
						@endif
					</p>
					<p>Địa chỉ nhận hàng : 
						@if($shipping_array['shipping_address']=='')
							<span >Chưa có thông tin</span>
						@else
							<span >{{$shipping_array['shipping_address']}}</span>
						@endif
					</p>	
					<p>Số điện thoại : 
						@if($shipping_array['shipping_phone']=='')
							<span >Chưa có thông tin</span>
						@else
							<span >{{$shipping_array['shipping_phone']}}</span>
						@endif
					</p>	
					<p>Ghi chú đơn hàng : 
						@if($shipping_array['shipping_notes']=='')
							<span >Chưa có thông tin</span>
						@else
							<span >{{$shipping_array['shipping_notes']}}</span>
						@endif
					</p>	
					<p>Hình thức thanh toán : <strong style="text-transform: uppercase;">
						@if($shipping_array['shipping_method']==0)
							Chuyển khoản ATM
						@else
							Tiền mặt
						@endif
					
					</strong></p>
					<p >Nếu thông tin người nhận Chưa có thông tin hoặc không đủ dữ liệu để gửi hàng chúng tôi sẽ liên hệ với người đặt hàng để trao đổi thông tin về đơn hàng đã đặt.</p>



					<h4 style="text-transform: uppercase;">Sản phẩm đã đặt</h4>

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
								<td>{{number_format($cart['product_price'],0,',','.')}} VNĐ</td>
								<td>{{$cart['product_qty']}}</td>
								<td>{{number_format($sub_total,0,',','.')}} VNĐ</td>
							</tr>
							@endforeach

							<tr>
								
								<td colspan="4" >Tổng tiền thanh toán khi chưa áp dụng mã giảm giá: {{number_format($total,0,',','.')}} VNĐ</td>
							</tr>

						</tbody>
					</table>

				</div>

				<p >Mọi chi tiết xin liên hệ website tại cửa hàng</a>, hoặc liên hệ qua số hotline : 0935.4567.03 .Cảm ơn quý khách đã đặt hàng tại cửa hàng.</p>

			</div>
		</div>
	</div>
</body>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
</html>