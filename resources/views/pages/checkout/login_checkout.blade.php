@extends('layout')
@section('content')

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                    @endif
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="email_account" placeholder="Tài khoản" />
                        <input type="password" name="password_account" placeholder="Password" />
                        
                        <span>
                            <a href="{{url('/quen-mat-khau')}}">Quên mật khẩu</a>
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>

                    </form>


                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-4">
                <div class="login-form">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký</h2>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" data-validation="length" data-validation-length="min1"
                                data-validation-error-msg="Nhập họ và tên" name="customer_name"
                                placeholder="Họ và tên" />
                            <input type="email" data-validation="length" data-validation-length="min1"
                                data-validation-error-msg="Nhập địa chỉ email" name="customer_email"
                                placeholder="Địa chỉ email" />
                            <input type="password" data-validation="length" data-validation-length="min1"
                                data-validation-error-msg="Nhập mật khẩu" name="customer_password"
                                placeholder="Mật khẩu" />
                            <input type="text" data-validation="length" data-validation-length="min1"
                                data-validation-error-msg="Nhập số điện thoại" name="customer_phone"
                                placeholder="Phone" />
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/form-->

@endsection