@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục sản phẩm
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
                        <th>Tên danh mục</th>
                        <th>Thuộc danh mục</th>
                        <th>Slug</th>
                        <th>Thứ tự danh mục</th>
                        <th>Hiển thị</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <style type="text/css">
                #category_order .ui-state-highlight {
                    padding: 24px;
                    background-color: #ffffcc;
                    border: 1px dotted #ccc;
                    cursor: move;
                    margin-top: 12px;
                }
                </style>

                <tbody id="category_order">

                    @php
                    $i = 0;
                    @endphp
                    @foreach($all_category_product as $key => $cate_pro)
                    @php
                    $i++;
                    @endphp

                    <tr id="{{$cate_pro->category_id}}">
                        <td><i>{{$i}}</i></label></td>
                        <td>{{ $cate_pro->category_name }}</td>
                        <td>
                            @if($cate_pro->category_parent==0)
                            <span style="color:red;">Danh mục cha</span>

                            @else

                            @foreach($category_product as $key => $cate_sub_pro)

                            @if($cate_sub_pro->category_id==$cate_pro->category_parent)
                            <span style="color:green;">{{$cate_sub_pro->category_name}}</span>
                            @endif

                            @endforeach

                            @endif
                        </td>
                        <td>{{ $cate_pro->slug_category_product }}</td>
                        <td>{{ $cate_pro->category_order }}</td>
                        <td><span class="text-ellipsis">
                                <?php
               if($cate_pro->category_status==0){
                ?>
                                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}">Hiển thị</a>
                                <?php
                 }else{
                ?>
                                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}">Ẩn</a>
                                <?php
               }
              ?>
                            </span></td>

                        <td>
                            <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}"
                                class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')"
                                href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}"
                                class="active styling-edit" ui-toggle-class="">
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

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$all_category_product->links()!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection