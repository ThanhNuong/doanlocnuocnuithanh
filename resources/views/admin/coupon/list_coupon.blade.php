@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê mã giảm giá
        </div>

        <div class="table-responsive">
            <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>

                        <th>Thứ tự</th>
                        <th>Tên mã</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Mã giảm </th>
                        <th>Số lượng</th>
                        <th>Điều kiện giảm</th>
                        <th>Số giảm</th>
                        <th>Tình trạng</th>
                        <th>Thời hạn</th>
                        <td>Quản lý</td>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($coupon as $key => $cou)
                    @php
                    $i++;
                    @endphp

                    <tr>
                        <td><i>{{$i}}</i></label></td>
                        <td>{{ $cou->coupon_name }}</td>
                        <td>{{ $cou->coupon_date_start }}</td>
                        <td>{{ $cou->coupon_date_end }}</td>

                        <td>{{ $cou->coupon_code }}</td>
                        <td>{{ $cou->coupon_time }}</td>
                        <td><span class="text-ellipsis">
                                <?php
              if($cou->coupon_condition==1){
                ?>
                                Giảm theo %
                                <?php
              }else{
                ?>
                                Giảm theo tiền
                                <?php
              }
              ?>
                            </span>
                        </td>
                        <td><span class="text-ellipsis">
                                <?php
            if($cou->coupon_condition==1){
              ?>
                                Giảm {{$cou->coupon_number}} %
                                <?php
            }else{
              ?>
                                Giảm {{$cou->coupon_number}} k
                                <?php
            }
            ?>
                            </span></td>
                        <td><span class="text-ellipsis">
                                <?php
            if($cou->coupon_status==1){
              ?>
                                <span style="color:green">Đang kích hoạt</span>
                                <?php
            }else{
              ?>
                                <span style="color:red">Đã khóa</span>
                                <?php
            }
            ?>
                            </span>
                        </td>
                        <td>

                            @if($cou->coupon_date_end>=$today && $cou->coupon_date_start<=$today) <span
                                style="color:green">Còn hạn</span>
                                @else
                                <span style="color:red">Đã hết hạn</span>
                                @endif


                        </td>
                        <td>

                            <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')"
                                href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$coupon->links()!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection