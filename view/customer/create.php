<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm khách hàng</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('customer', 'store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <div class="col-md-3">
                            <label for="">Hình ảnh đại diện</label><br>
                            <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?? 'Chưa có hình ảnh' ?>" alt="Avatar" title="Change the avatar">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Thông tin khách hàng</label>
                            <div class="row">
                                <label class="control-label col-md-3 col-sm-3 ">Tên <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập tên" name="firstname">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Họ <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập họ" name="lastname">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Giới tính <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Chọn giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Ngày sinh <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="date" class="form-control" name="dob" class="form-control">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Địa chỉ</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Email <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập email" name="email">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Số điện thoại <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Mật khẩu <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập mật khẩu" name="password">
                                </div>
                                <label class="control-label col-md-3 col-sm-3  ">Trạng thái <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 mt-2 ">
                                    <select name="status" id="" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="0">Khóa</option>
                                        <option value="1">Hoạt động</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Note</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <textarea type="text" class="form-control" placeholder="Nhập ghi chú(nếu có)" name="note"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="mt-2">
                            <a href="<?= href('customer', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success" name="save">Ghi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>