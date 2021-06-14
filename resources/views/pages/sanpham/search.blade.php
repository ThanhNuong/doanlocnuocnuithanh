@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                       @foreach($search_product as $key => $product)
                       <div class="col-sm-4">
        <div class="product-image-wrapper">

            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf

                        <input type="hidden" value="{{$product->product_id}}"
                            class="cart_product_id_{{$product->product_id}}">

                        <input type="hidden" id="wishlist_productname{{$product->product_id}}"
                            value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">

                        <input type="hidden" value="{{$product->product_quantity}}"
                            class="cart_product_quantity_{{$product->product_id}}">

                        <input type="hidden" value="{{$product->product_image}}"
                            class="cart_product_image_{{$product->product_id}}">

                        <input type="hidden" id="wishlist_productprice{{$product->product_id}}"
                            value="{{number_format($product->product_price,0,',','.')}}VNĐ">

                        <input type="hidden" value="{{$product->product_price}}"
                            class="cart_product_price_{{$product->product_id}}">

                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                        <a id="wishlist_producturl{{$product->product_id}}"
                            href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">

                            <img id="wishlist_productimage{{$product->product_id}}"
                                src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />

                            <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                            <p>{{$product->product_name}}</p>

                        </a>

                        <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart"
                            data-id_product="{{$product->product_id}}" name="add-to-cart">


                        <input type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                            class="btn btn-default xemnhanh" data-id_product="{{$product->product_id}}"
                            name="add-to-cart">


                    </form>


                </div>

            </div>

            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <style type="text/css">
                    ul.nav.nav-pills.nav-justified li {
                        text-align: center;
                        font-size: 13px;
                    }

                    .button_wishlist {
                        border: none;
                        background: #ffff;
                        color: #B3AFA8;
                    }

                    ul.nav.nav-pills.nav-justified i {
                        color: #B3AFA8;
                    }

                    .button_wishlist span:hover {
                        color: #FE980F;
                    }

                    .button_wishlist:focus {
                        border: none;
                        outline: none;
                    }
                    </style>

                    

                </ul>
            </div>
        </div>
    </div>
                        @endforeach
                    </div>
                    <!--features_items--> 
        <!--/recommended_items-->
@endsection