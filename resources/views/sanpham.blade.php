@extends('trangchu')
@section('content')
<div class="row">Danh sách sản phẩm</div>

<div class="row">
  <!-- <form action="/home/luugiohang" method="post"> -->
  @csrf
  <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
      <tr>
        <th>Hình</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Mua</th>
      </tr>
    </thead>

    <tbody class="tbody_dskhachhang">
      @foreach($product as $pr)
      <tr>
        <th><img src="{{'/frontend/'.$pr->image}}" width="100">
</div>
</th>
<th>{{$pr->Ten_cproduct}}</th>
<th><input type="hidden" name="idsp" value="{{$pr->Id_product}}">{{$pr->price}}</th>
<th>
  <div><button type="submit" class="btn btn-success m" value="{{$pr->Id_product}}">Mua</button>
    <div>
</th>
</tr>
@endforeach
</tbody>

</table>
<!-- </form> -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $('.m').each(function(index, mBtn) {
    $(mBtn).click(function(event) {

      $.ajax({
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/home/luugiohang',
        data: {
          'idsp': event.target.value
        },
        success: function(data) {

          $('#xuatthongbao').html('<div class="alert alert-primary tt role="alert">Đã thêm vào giỏ hàng</div>');
          // console.log(data.length);

          setTimeout(function()
           {
            $('.tt').addClass('d-none');
          }, 1000);

        }
      })

    })
   


  })
</script>


@endsection