<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật khách hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('customer', 'update', ['id' => $_GET['id']]) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <div class="col-md-3">
                            <label for="">Hình ảnh sản phẩm</label><br>
                            <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?? 'Chưa có hình ảnh' ?>" alt="Avatar" title="Change the avatar">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Thông tin khách hàng</label>
                            <div class="row">
                                <label class="control-label col-md-3 col-sm-3 ">Tên</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập tên" name="firstname" value="<?= $item->firstname ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Họ</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập họ" name="lastname" value="<?= $item->lastname ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Giới tính</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <select name="gender" id="" class="form-control">
                                        <option value="<?= $item->gender ?>" selected><?= $item->gender == 1 ? 'Nam' : 'Nữ' ?></option>
                                        <option value="">Chọn giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Ngày sinh</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" class="form-control" value="<?= date_format(new DateTime() , "d/m/Y "); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Địa chỉ</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="<?= $item->address ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập email" name="email" value="<?= $item->email ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Số điện thoại</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="<?= $item->phone ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Mật khẩu</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" value="<?= $item->password ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3  ">Trạng thái</label>
                                <div class="col-md-9 col-sm-9 mt-2 ">
                                    <select name="status" id="" class="form-control">
                                        <option value="<?= $item->status ?>" selected><?= $item->status == 1 ? 'Hoạt động' : 'Khóa' ?></option>
                                        <option value="">Chọn trạng thái</option>
                                        <option value="0">Khóa</option>
                                        <option value="1">Hoạt động</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 ">Note</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <textarea type="text" class="form-control" placeholder="Nhập ghi chú(nếu có)" name="note" value="<?= $item->note ?>"></textarea>
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