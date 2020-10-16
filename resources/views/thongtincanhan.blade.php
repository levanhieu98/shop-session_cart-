<div class="modal fade" id="thongtincanhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thông tin cá nhân</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form class="formSua" method="POST" action="/home/suathongtin" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ten" name="tenUS" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" disabled>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Sữa thông tin</button>
                        </div>
                    </form>
                    
                    <h1>Sản phẩm đã mua</h1>
                    <table id="tableLstKhachHang" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>Hình</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <!-- <th>Mua</th> -->
                            </tr>
                        </thead>

                        <tbody class="tbody_dskhachhang">
                            <tr>
                               
                                <th></th>
                                <th></th>
                                <th></th>
                                <!-- <th></th>
                              -->
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>