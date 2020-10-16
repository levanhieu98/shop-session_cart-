<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Sản phẩm cần bán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form class="formSua" method="POST" action="/home/themsanpham" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Hình</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="hinh" name="hinh">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên sản phẩm">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="gia" name="gia" placeholder="Nhập giá sản phẩm">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sl" name="sl" placeholder="Nhập số lượng sản phẩm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Loại sản phẩm</label>
                            <select class="form-control" name="loaisp" id="loaisp">
                               
                            @foreach($category as $c)
                                <option name="loaosp"  value="{{$c->Id_category}}">{{$c->Ten_category}}</option>

                            @endforeach  
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Đăng bán</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>