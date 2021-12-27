@extends('templates.default-page')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/package.css') }}">

@endsection

@section('content')

    <div id="pricing" class="section overlay">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3 style="color: white">Our Offer</h3>
                <p>We thanks for all our awesome testimonials! There are hundreds of our happy customers! </p>
            </div><!-- end title -->

            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                        <div class="pricingTable pri-bg-a"
                            style="background-image: url({{ asset($package->background) }});">
                            <div class="pricingTable-header">
                                <h3 class="title">{{ $package->name }}</h3>
                                <div class="price-value">
                                    <div class="value">
                                        <span class="amount" style="color: white;">
                                            @if ($package->price > 1000000)
                                                {{ $package->price / 1000000 }}M
                                            @else
                                                {{ $package->price / 1000 }}K
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <ul class="pricing-content" style="color: rgb(0, 0, 0); font-weight: 400">
                                @foreach ($package->criterias as $pc)
                                    <li>

                                        <i class='fas fa-check-circle' style='font-size:20px;color:green'>
                                        </i> {{ $pc->criteria->content }}
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ URL::to('/offer-detail/' . $package->id) }}"
                                class="hvr-radial-in pricingTable-signup"><i class="fa fa-dot-circle-o"></i>Chi tiết</a>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

    <section class="ftco-section ftco-services">
        <div class="row">
            <div class="col-md-8">
                <h1 style="text-align: center">Our Menu</h1>
                <div class="row" style="margin-left: 20px;margin-top: 60px">

                    @foreach ($menus as $menu)
                        <div class="col-md-6" style="margin-bottom: 50px">
                            <div class="title_menu ">{{ $menu->name }}</div>
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

                                <div class="d-flex text align-items-center">
                                    <h3 style="background: none;color:rgb(82, 82, 80)"><span class="total">Tổng
                                            tiền</span>
                                    </h3>
                                    <span class="price total"
                                        style="width: 200px">{{ number_format($menu->cost, 0) }}
                                        đ</span>
                                </div>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-3" style="padding-right: 80px;color: rgba(246, 12, 12, 0.794)">
                <h1 style="text-align: center; margin-bottom: 50px; color: rgb(112, 112, 112)">Đặt ngay</h1>
                <form method="POST" action="{{ route('createOrder') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group row">
                            <label for="organizationDate" style="font-size: 1.2em; color: rgb(112, 109, 109); font-weight: 400">Thời
                                gian</label>
                            <input type="datetime-local" class="inp form-control" id="dt" placeholder="Ngày/giờ" name="organizationDate"
                                style="color: rgb(105, 105, 105)">
                        </div>
                        <div class="form-group row my-col">
                            <label style="font-size: 1.2em; color: rgb(112, 112, 112); font-weight: 400" for="peopleNumber">Số
                                lượng
                                người</label>
                            <input type="number" class="inp form-control" id="peopleNumber" name="peopleNumber">
                        </div>
                        <div class="form-group row my-col sel">
                            <label style="font-size: 1.2em; color: rgb(133, 128, 128); font-weight: 400"
                                for="menuId">Menu</label>
                            <select class="form-control sel" style="width: 200%" name="menuId">
                                <option value="0">Chọn menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row my-col" style="width: 120%">
                            <label style="font-size: 1.2em; color: rgb(121, 118, 118); font-weight: 400" for="note">Ghi
                                chú</label>
                            <textarea class="inp form-control" id="note" name="note"></textarea>
                        </div>
                        <div class="row btn-order">
                            <button style="width: 100%;border-color: rgb(126, 125, 125)" class="btn btn-dark" type="submit">Đặt
                                đơn</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>




    </section>

@endsection
