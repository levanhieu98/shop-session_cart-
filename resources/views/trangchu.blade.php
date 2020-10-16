<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="row ml-5">
        <div>{{Auth::user()->name}}</div>
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle btn-sm ml-1" data-toggle="dropdown">
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/logout">Đăng xuất</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#thongtincanhan">Thông tin cá nhân</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng bán sản phẩm</a>
                <a class="dropdown-item" href="/home/xemgiohang" >Giỏ hàng  </a>
                <a class="dropdown-item" href="/home/sanphamdamua" >Sản phẩm đã mua</a>
                 <a class="dropdown-item" href="/home/donhangdattruoc" >Đơn hàng đặt trước từ người mua</a>
                
            </div>
        </div>
        <div id="xuatthongbao"></div>

    </div>

    <nav class="navbar navbar-expand-sm bg-light navbar-light ">
        <ul class="navbar-nav ">
            @foreach($category as $c)
            <li class="nav-item active">
                <a class="nav-link" href="/home/sanpham/{{$c->Id_category}}">{{$c->Ten_category}}</a>
            </li>
            @endforeach
        </ul>
    </nav>

    <div class="container">
        @yield('content')
        <div>
</body>

@include('bansanpham')
@include('thongtincanhan')
</html>