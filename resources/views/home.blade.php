@extends('layouts.app')

@section('content')
<div class="container bg-light ">
    <div class="row">Danh sách sản phẩm</div>

    <div class="row">
        <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 80%;">

            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>

            <tbody class="tbody_dskhachhang">
            @foreach($product as $pr)
                <tr>
                   
                    <th><img src="{{'/frontend/'.$pr->image}}" width="100"></th>
                    <th>{{$pr->Ten_cproduct}}</th>
                    <th>{{$pr->price}}</th>
                    <th> <a href="/mosanpham/{{$pr->Id_product}}" class="btn btn-warning waves-effect btn-sm {{$pr->Trangthai==0?'':'d-none'}}">Ẩn </a>
                        <a href="/khoasanpham/{{$pr->Id_product}}" class="btn btn-success btn-sm waves-effect {{$pr->Trangthai==1?'':'d-none'}}">Hiện </a>
                    </th>
                  
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection