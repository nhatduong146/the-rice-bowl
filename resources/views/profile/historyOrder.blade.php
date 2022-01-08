@extends('profile.profile')



@section('profile-body')
    <div class="row gutters">
      <div class="col-12">
        <table class="table-history w-100" id="table-history-order">
          <thead>
              <tr class="headings text-center " style="font-size: 20px">
                  <th class="column-title" style="width: 10%">STT </th>
                  <th class="column-title" style="width: 18.75%">Loại dịch vụ </th>
                  <th class="column-title" style="width: 18.75%">Ngày đặt </th>
                  <th class="column-title" style="width: 18.75%">Tổng tiền </th>
                  <th class="column-title" style="width: 18.75%">Trạng thái </th>
                  <th class="column-title" style="width: 15%">Hành động </th>
              </tr>
          </thead>
          <tbody class="text-center" style="font-size: 18px">
              <tr class="even pointer">
                  <td class=" ">1</td>
                  <td class=" ">2</td>
                  <td class=" ">3</td>
                  <td class=" ">4</td>
                  <td class=" ">5</td>
                  <td class=" last">
                      <button class="btn btn-danger"
                      onclick="window.location.href = '' ">Xem chi tiet</button></td>
              </tr>
          </tbody>
      </table>
      </div>
    </div>
@endsection