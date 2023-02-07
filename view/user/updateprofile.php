<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật tài khoản</h2>
                <?= $msg ?? '' ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" action="<?= href('user', 'updateprofile', ['id' => $item->id]) ?>" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" value="<?= $item->firstname ?>" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Họ <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= $item->lastname; ?>" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Ngày sinh <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control" placeholder="Nhập ngày sinh" value="<?= $item->dob ?>" name="dob">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Giới tính <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="gender" id="" class="form-control">
                                            <option value="<?= $item->gender ?>" selected><?= $item->gender == 1 ? 'Nam' : 'Nữ' ?></option>
                                            <option value="<?= $item->gender == 1 ? '0' : '1' ?>"><?= $item->gender == 1 ? 'Nữ' : 'Nam' ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Vị trí</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="position" class="form-control" placeholder="Nhập vị trí" value="<?= $item->position ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Bộ phận</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="division" class="form-control" placeholder="Nhập bộ phận" value="<?= $item->division ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="email" class="form-control" placeholder="Nhập email" value="<?= $item->email ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Phone </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= $item->phone ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Địa chỉ</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="address" class="form-control" placeholder="Nhập địa chỉ"><?= $item->address ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Mật khẩu <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="password" name="password" class="form-control" placeholder="Disabled Input" value="<?= $item->password ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="<?= href('system', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <input type="submit" class="btn btn-success" value="Ghi" name="save">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>