@extends('templates.default-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/app.css?v=').time() }}"> 
    <script src="{{ asset('public/js/app.js') }}" defer></script>  
@endsection
@section('content')

{{-- <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">3 items</div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                    <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS 3</div>
                <div class="col text-right">&euro; 132.00</div>
            </div>
            <form>
                <p>SHIPPING</p> <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; 137.00</div>
            </div> <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-9 mt-2">
            <div class="mb-5">

                <div class="row">
                    <div class="col-12 border p-4">
                        <h2 class="text-center">ĐƠN HÀNG CỦA BẠN</h2>
                        <h3>Dịch vụ cưới</h3>
                        <span style="font-size: 20px; color:#fff;">Số lượng khách: 
                            <span style="color: #fac564">{{ $order->peopleNumber  }}</span> khách</span><br>
                        <span style="font-size: 20px; color:#fff;">Ngày tổ chức: 
                            <span style="color: #fac564">{{ $order->organizationDate  }}</span></span><br>
                        <span style="font-size: 20px; color:#fff;">Menu:</span>

                        <div class="col-12 pt-3" style="margin-bottom: 50px">
                            {{-- <div class="title_menu ">{{ $menu->name }}</div> --}}
                            <div class="pricing-entry">
                                @foreach ($menu->menuFoods as $mf)
                                    <div class="d-flex text align-items-center" style="margin-bottom: 35px">
                                        <img src="{{ asset($mf->food->image) }}"
                                            style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px;
                                                                                                                                 box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                        &nbsp;&nbsp;
                                        <h3 style="background: none"><span>{{ $mf->food->name }}</h3>
                                        <span class="price">{{ number_format($mf->food->price, 0) }}đ</span>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                        
                    </div>
                </div>
            </div>
        </div>


        <div class="col-3">
            <div class="mt-2">
                <div class="row">
                    <div class="cart-total-prices">
                        <div class="cart-total-prices__inner sticky ">
                            
                            <div class="customer-address border border-primary">
                                <p class="heading d-flex justify-content-between">
                                    <span class="text"">Khách hàng</span>
                                    <span data-view-id="cart_shipping_location.change" class="link">Thay đổi</span>
                                </p>
                                <p class="title">
                                    <b class="name">Nguyễn Đình Khoa</b>
                                    <b class="phone">0777443873</b></p>
                                <p class="address" >Kiệt 109/35 Phạm Như Xương, Phường Hòa Khánh Nam, Quận Liên Chiểu, Đà Nẵng</p>
                            </div>

                            <div class="prices border border-primary">
                                <ul class="prices__items pl-0 pb-3">
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: #fff">Tạm tính</span>
                                        <span class="prices__value" style="color: #fe3834">209.000.000đ</span>
                                    </li>
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: #fff">Giảm giá</span>
                                        <span class="prices__value" style="color: #fe3834">0đ</span>
                                    </li>
                                </ul>
                                <div class="prices__total d-flex justify-content-between">
                                    <span class="prices__text d-inline-block" style="font-weight: 300;color: #fff;">Tổng cộng</span>
                                    <div class="prices__content text-right">
                                        <span class="prices__value prices__value--final">209.000.000đ</span>
                                        <span class="prices__value--noted">(Đã bao gồm VAT nếu có)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="select-method">
                                <select>
                                    <option selected>Chọn phương thức thanh toán</option>
                                    @foreach ($paymentMethods as $paymentMethod)
                                        <option class="mt-2 mb-2" value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                    @endforeach
                                  </select>
                                
                            </div>
                            <button data-view-id="cart_navigation_proceed" type="button" class="cart__submit btn btn-primary">ĐẶT HÀNG</button>
                            <div id="paypal-button"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
@endsection