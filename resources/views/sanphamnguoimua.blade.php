@extends('layouts.app')
@section('content')
<div class="container bg-light ">
    <div class="row">Sản phẩm mua</div>

    <div class="row">
        <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    
                    <th>Ten_cproduct</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>Date</th>
        
                </tr>
            </thead>

            <tbody class="tbody_dskhachhang">
             @foreach($spm as $m)
                <tr>
                    <th>{{$m->Name_product}}</th>
                    <th>{{$m->price}}</th>
                    <th>{{$m->quantity}}</th>
                    <th>{{$m->Date}}</th>
                </tr>
            @endforeach 
            </tbody>
            <a href="/danhsachkhachhang" class="btn btn-success btn-sm mb-2">Trở về</a>
        </table>

    </div>
</div>
@endsection