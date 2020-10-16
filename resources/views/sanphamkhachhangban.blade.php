@extends('layouts.app')
@section('content')
<div class="container bg-light ">
    <div class="row">Sản phẩm bán</div>

    <div class="row">
        <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>Id_product</th>
                    <th>Ten_cproduct</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>image</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody class="tbody_dskhachhang">
               @foreach($pro as $p)
                <tr>
                    <th>{{$p->Id_product}}</th>
                    <th>{{$p->Ten_cproduct}}</th> 
                    <th>{{$p->price}}</th> 
                    <th>{{$p->quantity}}</th>
                    <th><img src="{{'/frontend/'.$p->image}}" width="80px" alt=""></th>
                    <th><a href="/khoasanphamKH/{{$p->id_user}}/{{$p->Id_product}}" class="btn btn-success btn-sm">Ẩn</a></th> 
                </tr>
                @endforeach
            </tbody>
            <a href="/danhsachkhachhang" class="btn btn-success btn-sm mb-2">Trở về</a>
        </table>

    </div>
</div>
@endsection