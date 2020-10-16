@extends('trangchu')
@section('content')
<div class="row">Thông tin đơn hàng người mua</div>

<div class="row">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID_Customer</th>
                    <th>Name product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Ngày mua</th>
                    <th>Xử lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oderbill as $ol)
                <td scope="row">{{$ol->Name}}</td>
                <td>{{$ol->Name_product}}</td>
                <td>{{$ol->price}}</td>
                <td>{{$ol->quantity}}</td>
                <td>{{$ol->Date}}</td>
                <td><div class="btn-group" data-toggle="buttons">
                    
                    <label class="btn btn-primary">
                        <input type="checkbox" name="" id="" autocomplete="off">
                    </label>
                    
                </div></td>
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