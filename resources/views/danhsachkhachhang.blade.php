@extends('layouts.app')

@section('content')
<div class="container bg-light ">
    <div class="row">Danh sách khách hàng</div>

    <div class="row">
        <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Lịch sử</th>
                </tr>
            </thead>

            <tbody class="tbody_dskhachhang">
                @foreach($us as $u)
                <tr>
                    <th>{{$u->id}}</th>
                    <th>{{$u->name}}</th> 
                    <th><a href="/sanphamkhachhangban/{{$u->id}}" class="btn btn-success">lịch sử bán</a>
                    <a href="/sanphamkhachhangmua/{{$u->id}}" class="btn btn-success">lịch sử mua</a>
                    </th>   
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection