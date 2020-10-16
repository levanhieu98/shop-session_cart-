@extends('trangchu')
@section('content')
<div class="row">Thông tin mua hàng</div>

<div class="row">
    <div class="container">
        <form class="formSua" method="POST" action="/home/luugiohangDB">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Nhập tên">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="customerAddree" name="customerAddree" placeholder="Nhập địa chỉ">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">SDT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="Nhập địa chỉ">
                </div>
            </div>
            </div>
           <button type="submit" class="btn btn-success form-control ">Đồng ý mua hàng</button>
          
        </form>
    </div>
</div>
</div>
</form>
</div>


@endsection