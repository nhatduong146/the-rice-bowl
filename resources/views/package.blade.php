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
                <h3 style="color: white">GÓI ƯU ĐÃI</h3>
                <p>Nhà hàng the rice bowl luôn có các gói ưu đãi của từng dịch vụ, sẵn sàng đáp ứng nhu cầu của bạn </p>
            </div><!-- end title -->

            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                        <div class="pricingTable pri-bg-a"
                            style="background-image: url({{ asset($package->background) }});">
                            <div class="pricingTable-header">
                                <h3 class="title">{{ $package->content }}</h3>
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

    <section class="ftco-section ftco-services" style="overflow: hidden">
        <h1 style="text-align: center; margin-bottom: 50px; color: rgb(112, 112, 112)">Đặt ngay</h1>
        <div class="row">
            <div class="col-12 ">
                <form method="POST" action="{{ route('createOrder') }}">
                    @csrf
                    <div class="form-order d-flex flex-row">
                        <div class="form-group col-3">
                            <label for="organizationDate"
                                style="font-size: 1.2em; color: rgb(112, 109, 109); font-weight: 400">Thời
                                gian</label>
                            <input type="datetime-local" class="inp form-control" id="dt" placeholder="Ngày/giờ"
                                name="organizationDate" style="color: rgb(105, 105, 105)">
                        </div>
                        <div class="form-group col-2 ">
                            <label style="font-size: 1.2em; color: rgb(112, 112, 112); font-weight: 400"
                                for="peopleNumber">Số
                                lượng
                                người</label>
                            <input type="number" class="inp form-control" id="peopleNumber" name="peopleNumber">
                        </div>
                        
                        <div class="form-group col-4 ">
                            <label style="font-size: 1.2em; color: rgb(121, 118, 118); font-weight: 400" for="note">Ghi
                                chú</label>
                            <input type="text" class=" form-control" id="note" name="note"></input>
                        </div>
                        <div class="form-group col-3 btn-order d-flex align-items-end">
                            <button style="width: 100%;border-color: rgb(126, 125, 125)" class="btn btn-success"
                                type="submit">Đặt
                                đơn</button>
                        </div>
                    </div>

                </form>
    
                
            </div>

            
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-row" style="padding: 0 15px">
                <div class="col-6" >
                    <div class="d-flex flex-column justify-content-start align-items-start" >
                        <div class="form-group w-50 " >
                            <label style="font-size: 1.2em; color: rgb(133, 128, 128); font-weight: 400"
                                for="menuId">Menu</label>
                            <select class="form-control sel" name="menuId" id="menu">
                                <option value="0">Chọn menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-12">
                            

                            <table class="table-food" id="table-select-food">
                                <thead>
                                    <tr class="headings text-center" style="font-size: 20px">
                                        <th class="column-title" style="width: 25%">Ảnh </th>
                                        <th class="column-title" style="width: 25%">Tên </th>
                                        <th class="column-title" style="width: 25%">Giá </th>
                                        <th class="column-title" style="width: 25%">Hành động </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="font-size: 18px">
                                    <tr class="even pointer">
                                        <td class=" ">1</td>
                                        <td class=" ">2</td>
                                        <td class=" ">3</td>
                                        <td class=" last">
                                            <button class="btn btn-danger"
                                            onclick="window.location.href = '' ">Xóa</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
    
                    </div>
                </div>
    
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 list-food">
                            <label style="font-size: 1.2em; color: rgb(133, 128, 128); font-weight: 400"
                                for="menuId">Danh sách món ăn</label>
                            <table class="table-list-food" id="table-list-food">
                                <thead>
                                    <tr class="headings text-center" style="font-size: 20px">
                                        <th class="column-title" style="width: 25%">Ảnh </th>
                                        <th class="column-title" style="width: 25%">Tên </th>
                                        <th class="column-title" style="width: 25%">Giá </th>
                                        <th class="column-title" style="width: 25%">Hành động </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="font-size: 18px">
                                    @foreach ($foods as $food)
                                        <tr class="even pointer">
                                            <td class=" ">
                                                <img src="{{ asset($food->image) }}" alt="" class="img-food"></td>
                                            <td class=" ">{{ $food->name }}</td>
                                            <td class=" ">{{ $food->price }}</td>
                                            <td class=" last">
                                                <button class="btn btn-primary"
                                                onclick="window.location.href = '' ">Thêm</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>



    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#menu').on('change', function(event) {
                event.preventDefault();
                var id = $('#menu option').filter(":selected").val();
                // var id = $('#menu').value;
                // alert(id);
                var _token = $('input[name=_token]').val(); 
                $.ajax({
                    url:"{{route('showMenuById')}}",
                    method:"POST",
                    data:{
                        id: id,
                        _token: _token
                    },
                    dataType:"JSON",
                    success:function(data){
                        $('#table-select-food tbody').html(data.table_data);
                    }
                })
            })
        })

    </script>
@endsection
