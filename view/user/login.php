<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="<?= href('user', 'loginpost') ?>">
                    <h1>Đăng nhập hệ thống</h1>
                    <?= $msg ?>
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div>
                        <button class="btn btn-default submit">Đăng nhập</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
                <a href="<?= href('user', 'register') ?>">Đăng ký tài khoản</a>
                <a href="<?= href('user', 'forgot_psw') ?>">Quên mật khẩu</a>
                <div class="separator">
                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2022 All Rights Reserved. Nguyễn Bá Lợi
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>