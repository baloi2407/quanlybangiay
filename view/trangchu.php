<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin tài khoản</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <div class="form-horizontal form-label-left">
                                    <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?>" alt="Avatar" title="Change the avatar">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-horizontal form-label-left">
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tên đăng nhập</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" value="<?= $item->username ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tên <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" readonly value="<?= $item->firstname ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Họ <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" readonly value="<?= $item->lastname; ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Ngày sinh <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" placeholder="Nhập ngày sinh" readonly value="<?= $item->dob ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Giới tính <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 " >
                                    <select id="" class="form-control"readonly>
                                        <option  value="<?= $item->gender ?>" selected><?= $item->gender == 1 ? 'Nam' : 'Nữ' ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Vị trí <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Nhập vị trí" readonly value="<?= $item->position ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Bộ phận <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Nhập bộ phận" readonly value="<?= $item->division ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Email <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Nhập email" readonly value="<?= $item->email ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Phone </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại" readonly value="<?= $item->phone ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Địa chỉ</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" placeholder="Chưa có địa chỉ" readonly><?= $item->address ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="status" id="" class="form-control"readonly>
                                        <option  value="<?= $item->status ?>" selected><?= $item->status == 1 ? 'Hoạt động' : 'Khóa' ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Mật khẩu <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="password" class="form-control" placeholder="Disabled Input" readonly value="<?= $item->password ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Group <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control" readonly>
                                        <option selected  value="<?= $item->group_id ?>"><?= ((new group())->_item($item->group_id))->name ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="<?= href('user', 'editprofile', ['id' => $_SESSION['login_id']]) ?>" type="button" class="btn btn-primary">Sửa</a>
                            </div>

                        </div>

                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
</div>