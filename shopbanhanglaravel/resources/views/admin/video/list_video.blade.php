@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê videos
    </div>
  
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            
            <th>Tên video</th>
            <th>Slug</th>
            <th>Hình ảnh</th>
            <th>Link</th>
            <th>Mô tả</th>
            <th>Quản lý</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            
      
        </tbody>
      </table>
      <div id="video_load"></div>
    </div>
  
  </div>
</div>
@endsection