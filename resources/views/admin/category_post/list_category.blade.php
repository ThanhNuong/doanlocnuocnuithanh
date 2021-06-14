@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục bài viết
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
                        <th>Tên danh mục bài viết</th>
                        <th>Mô tả danh mục</th>
                        <th>Slug</th>
                        <th>Hiển thị</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($category_post as $key => $cate_post)
                    @php
                    $i++;
                    @endphp

                    <tr>
                        <td><i>{{$i}}</i></label></td>
                        <td>{{ $cate_post->cate_post_name }}</td>
                        <td>{{ $cate_post->cate_post_desc }}</td>
                        <td>{{ $cate_post->cate_post_slug }}</td>
                        <td>
                            @if($cate_post->cate_post_status==0)
                            Hiển thị
                            @else
                            Ẩn
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}"
                                class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')"
                                href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}"
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
                        {!!$category_post->links()!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection