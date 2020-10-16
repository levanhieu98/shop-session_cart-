@extends('trangchu')
@section('content')
<div class="row">Thông tin mua hàng</div>

<div class="row">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Ngày mua</th>
                </tr>
            </thead>
            <tbody>
                @foreach($spm as $m)
                <tr>
                    <td scope="row">{{$m->Name_product}}</td>
                    <td>{{$m->price}}</td>
                    <td>{{$m->quantity}}</td>
                    <td>{{date('d-m-Y', strtotime($m->Date))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
          
        </form>
    </div>
</div>
</div>
</form>
</div>


@endsection