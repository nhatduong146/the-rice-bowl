@extends('templates.default-page')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css?v=') . time() }}"> --}}
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('public/css/cart.css') }}">
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
        <div class="row" id="wrapper">
            <div class="col-6 mt-2">
                <div class="mb-5">

                    <div class="row">
                        <div class="col-12 p-4" id="infor">
                            <h4 class="text-center">ĐƠN HÀNG CỦA BẠN</h4>
                            <span style="font-size: 20px; color:#fff;">Loại dịch vụ:</span>
                            <span style="color: #fac564">Dịch vụ cưới</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Số lượng khách:</span>
                            <span style=" color: #fac564">{{ $order->peopleNumber }}</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Thời gian tổ chức:</span>
                            <span style="color: #fac564">{{ $order->organizationDate }}</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Ghi chú:</span>
                            <span style=" color: #fac564">Không</span>
                            <br><br>
                            <span style="font-size: 20px; color:#fff;">Thực đơn:</span>

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


            <div class="col-6" id="checkout">
                <div class="mt-2">
                    <div class="row">
                        <div class="cart-total-prices">
                            <div class="cart-total-prices__inner sticky ">
                                <div class="customer-address">
                                    <p class="heading d-flex justify-content-between title-r">
                                        <span class="" style=" color: #000000;font-size: 20px"><b>Thông tin
                                                khách hàng</b></span>
                                        <span data-view-id="" style="color: #2f4257">Thay
                                            đổi</span>
                                    </p>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold;">Tên khách
                                        hàng:</span>
                                    <span style="color: #34495e">Nguyễn Đình Khoa</span>
                                    <br>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold">Số điện
                                        thoại:</span>
                                    <span style="color: #34495e">0777443873</span>
                                    <br>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold">Địa chỉ:</span>
                                    <span style="color: #34495e">Kiệt 109/35 Phạm Như Xương, Phường Hòa Khánh Nam, Quận
                                        Liên Chiểu, Đà Nẵng</span>
                                    <br>

                                </div>

                                <div class="prices">
                                    <p class="title-r title-2" style="">
                                        <span class="tt" style=" color: #000000;"><b>Chi
                                                phí</b></span>
                                    </p>
                                    <ul class="prices__items pl-0 pb-3">
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Tạm tính</span>
                                            <span class="prices__value" style="color: #34495e">{{ number_format($totalCost, 0) }}đ</span>
                                        </li>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Thuế</span>
                                            <span class="prices__value" style="color: #34495e">0đ</span>
                                        </li>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Giảm giá</span>
                                            <span class="prices__value" style="color: #34495e">0đ</span>
                                        </li>
                                        <hr>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0); font-size: 20px">Tổng
                                                cộng</span>
                                            <span class="prices__value"
                                                style="color: #34495e; font-weight: bold; font-size: 20px">{{ number_format($totalCost, 0) }}đ</span>
                                        </li>

                                    </ul>
                                    <div class="prices__total d-flex justify-content-between">

                                    </div>
                                </div>

                                <div class="select-method row">
                                    {{-- <div class="col-1"></div>
                                    <select id="payment" class="col-6">
                                        <option selected>Chọn phương thức thanh toán</option>
                                        @foreach ($paymentMethods as $paymentMethod)
                                            <option class="mt-2 mb-2" value="{{ $paymentMethod->id }}">
                                                {{ $paymentMethod->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="paypal-button" class="col-5"></div> --}}
                                </div>
                                <button data-view-id="cart_navigation_proceed" type="button" class="cart__submit">Đặt dịch
                                    vụ</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
