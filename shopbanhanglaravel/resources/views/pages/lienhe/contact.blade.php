@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
       
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


                 <h1>
        Video Call<br><small style="font-size: 14pt;">Powered by Agora.io</small>
    </h1>
    <h4>Local video</h4>
    <div id="me"></div>
    <h4>Remote video</h4>
    <div id="remote-container">
    </div>
        
                   
</div><!--features_items-->
                 
@endsection