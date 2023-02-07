<div>
    <div class="login_wrapper">
        <div class=" ">
            <section class="">
                <?= $msg ?? '' ?>
                <form method="post" action="<?= href('user', 'register') ?>">
                    <h1>Đăng ký tài khoản</h1>

                    <div>
                        <label for="">Tên đăng nhập <span class="text-danger">(*)</span></label>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=post('username')?>">
                    </div>
                    <div>
                        <label for="">Tên <span class="text-danger">(*)</span></label>
                        <input type="text" name="firstname" class="form-control" placeholder="Tên" value="<?=post('firstname')?>">
                    </div>
                    <div>
                        <label for="">Họ <span class="text-danger">(*)</span></label>
                        <input type="text" name="lastname" class="form-control" placeholder="Họ" value="<?=post('lastname')?>">
                    </div>
                    <div>
                        <label for="">Ngày sinh <span class="text-danger">(*)</span></label>
                        <input type="date" name="dob" class="form-control mb-2" placeholder="Ngày sinh" value="<?=post('dob')?>">
                    </div>
                    <div>
                        <label for="">Giới tính <span class="text-danger">(*)</span></label>
                        <select name="gender" id="" class="form-control">
                            <option value="">Chọn giới tính</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Địa chỉ</label>
                        <textarea name="address" placeholder="Địa chỉ" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="">Số điện thoại </label>
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="<?=post('phone')?>">
                    </div>
                    <div>
                        <label for="">Email <span class="text-danger">(*)</span></label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?=post('email')?>">
                    </div>
                    <div>
                        <label for="">Vị trí <span class="text-danger">(*)</span></label>
                        <input type="text" name="position" class="form-control" placeholder="Vị trí" value="<?=post('position')?>">
                    </div>
                    <div>
                        <label for="">Bộ phận <span class="text-danger">(*)</span></label>
                        <input type="text" name="division" class="form-control" placeholder="Bộ phận" value="<?=post('division')?>">
                    </div>
                    <div>
                        <label for="">Mật khẩu <span class="text-danger">(*)</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="">
                    </div>
                    <div class="btn btn-default">
                        <input type="submit" name="save" value="Đăng ký" class="btn btn-primary">
                    </div>
                    <div class="clearfix"></div>
                </form>
                <a href="<?= href('user', 'index') ?>">Đăng nhập</a>
                <a href="<?= href('user', 'forgot_psw') ?>">Quên mật khẩu</a>
                <div class="separator">
                    <div>
                        <p>©2022 All Rights Reserved. Nguyễn Bá Lợi
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>