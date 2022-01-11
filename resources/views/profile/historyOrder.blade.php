@extends('profile.profile')



@section('profile-body')
    <div class="row gutters">
      <div class="col-12">
        <table class="table-history w-100" id="table-history-order">
          <thead>
              <tr class="headings text-center " style="font-size: 20px; color: #fff">
                  <th class="column-title" style="width: 10%">STT </th>
                  <th class="column-title" style="width: 18.75%">Loại dịch vụ </th>
                  <th class="column-title" style="width: 18.75%">Ngày đặt </th>
                  <th class="column-title" style="width: 18.75%">Tổng tiền </th>
                  <th class="column-title" style="width: 18.75%">Trạng thái </th>
                  <th class="column-title" style="width: 15%">Hành động </th>
              </tr>
          </thead>
          <tbody class="text-center" style="font-size: 18px; color: #ccc">
            @foreach ($orders as $order)
                <tr class="even pointer">
                    <td class=" ">{{ ++$i }}</td>
                    <td class=" ">{{ $order->services->name }}</td>
                    <td class=" ">{{ $order->organizationDate }}</td>
                    <td class=" ">{{ number_format($order->totalCost, 0).' VNĐ' }}</td>
                    <td class=" ">{{ $order->order_status->name }}</td>
                    <td class=" last">
                        <button class="btn btn-info" style="border-radius: 5px"
                        onclick="window.location.href = '{{ URL::to('/cart/'.$order->id) }}' ">Xem chi tiet</button></td>
                </tr>
            @endforeach
              
          </tbody>
      </table>
      </div>
    </div>
@endsection