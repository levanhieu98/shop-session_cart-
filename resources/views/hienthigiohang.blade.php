@extends('trangchu')
@section('content')
          <div class="alert alert-primary" role="alert">
            <strong>Số lượng sản phẩm trong giỏ hàng : @if(Session::has('giohang')){{count(Session::get('giohang'))}} @endif</strong>
          </div>
          <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 70%;">
            <thead>
              <tr>
                <th>Hình</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th></th>

              </tr>
            </thead>
            <tbody class="tbody_dskhachhang">
              @if((Session::has('giohang')))
              @foreach(Session::get('giohang') as $test)
              <tr>
                <th>{{$test['img']}}</th>
                <th>{{$test['name_product']}}</th>
                <th>{{$test['price']}}</th>
                <th>{{$test['qty']}}</th>
                <th>{{$test['qty']*$test['price']}}</th>
                <th><a href="/home/xoasp/{{$test['id']}}">xóa</a></th>
              </tr>
              @endforeach
              <tr>
                <th>Tổng tiền</th>
                <th colspan="4" class="text-center">  @if((Session::has('giohang'))&&(count(Session::get('giohang'))>0))
                  {{session()->get('tt')}}
                  @else
                  {{0}}
                  @endif

              </tr>
              @endif
            </tbody>
          </table>
          <a href="/home/thanhtoan" class="btn btn-success">Thanh toán</a>
        
@endsection
