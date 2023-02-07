<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm tài khoản</h2>
                <div class="clearfix"></div>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= href('user', 'store') ?>" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <label for="">Hình ảnh </label><br>
                                    <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?? 'Chưa có hình ảnh' ?>" alt="Avatar" title="Change the avatar">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tên đăng nhập <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= post('username') ?? '' ?>" name="username" placeholder="Nhập tên đăng nhập" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Họ <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= post('firstname') ?? '' ?>" name="firstname" placeholder="Nhập tên">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tên <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= post('lastname') ?? '' ?>" name="lastname" placeholder="Nhập họ">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Ngày sinh <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="date" class="form-control" placeholder="Nhập ngày sinh" value="<?= post('dob') ?? '' ?>" name="dob">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Giới tính <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="gender" id="" class="form-control">
                                            <option value="">Chọn giới tính</option>
                                            <option value="0">Nữ</option>
                                            <option value="1">Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Vị trí <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="position" class="form-control" placeholder="Nhập vị trí" value="<?= post('position') ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Bộ phận <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="division" class="form-control" placeholder="Nhập bộ phận" value="<?= post('division') ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="email" class="form-control" placeholder="Nhập email" value="<?= post('email') ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Phone</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= post('phone') ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Địa chỉ</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="address" class="form-control" placeholder="Nhập địa chỉ"><?= post('address') ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="status" id="" class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Khóa</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Mật khẩu <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Group </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="group" id="" class="form-control">
                                            <option value="">Chọn group</option>
                                            <?php
                                            foreach ($list as $item) {
                                            ?>
                                                <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="<?= href('user', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <input type="submit" class="btn btn-success" value="Ghi" name="save">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>