<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= href() ?>" class="site_title"><i class="fa fa-paw"></i> <span>Admin tool</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?= getavatar($_SESSION['login_avt'])  ?>" alt="<?= $_SESSION['login_name'] ?>" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Chào,</span>
                <h2><?= $_SESSION['login_name'] ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Tông quan</a>
                    </li>
                    <li><a><i class="fa fa-bar-chart"></i> Bán hàng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Đơn hàng <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('order', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('order', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a>Khách hàng <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('customer', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('customer', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="<?= href('statistic', 'index') ?>">Báo cáo</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shopping-bag"></i> Sản xuất <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Danh mục <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('category', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('category', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a>Sản phẩm <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('product', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('product', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a>Nhà cung cấp <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('supplier', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('supplier', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <?php
                    if (checkgroupshow('Manager')) {
                    ?>
                        <li><a><i class="fa fa-users"></i> Quản trị <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= href('user', 'index') ?>">Danh sách</a></li>
                                <li><a href="<?= href('user', 'create') ?>">Thêm</a></li>
                                <li><a>Nhóm quyền <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= href('group', 'index') ?>">Danh sách</a></li>
                                        <li><a href="<?= href('group', 'create') ?>">Thêm</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if (checkgroupshow('Manager')) {
                    ?>
                        <li><a><i class="fa fa-wrench"></i> Hệ thống <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="">Lịch sử</a></li>
                                <li><a href="">Cấu hình</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li><a><i class="fa fa-globe"></i>Tin tức <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Danh mục <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('newscategory', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('newscategory', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a>Bài viết <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= href('news', 'index') ?>">Danh sách</a></li>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <li><a href="<?= href('news', 'create') ?>">Thêm</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>