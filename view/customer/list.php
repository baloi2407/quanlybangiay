<div class="row">
    <div class="col-md-12">
        <?php
        if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
        ?>
            <a href="<?= href('customer', 'create') ?>" class="btn btn-large btn-primary">Thêm khách hàng</a>
        <?php
        }
        ?>
        <?= $msg ?? '' ?>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                <div class="input-group">
                    <form action="<?= href('customer', 'index') ?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Gõ email hoặc số điện thoại" name="keyword">
                            </div>
                            <div class="col-4 px-0">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary text-white" type="submit" name="search">Tìm kiếm</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách khách hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?= $item->id ?></th>
                                <td><?= $item->firstname . ' ' . $item->lastname ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->phone ?></td>
                                <td><?= $item->status == 1 ? '<span class="badge badge-success">Đã xác nhận</span>' : '<span class="badge badge-dark">Chưa xác nhận</span>' ?>
                                <td>
                                    <?php
                                    if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                    ?>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('customer', 'edit', ['id' => $item->id]) ?>" role="button">Sửa</a>
                                        <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('customer', 'delete', ['id' => $item->id]) ?>" role="button">Xóa</a>
                                    <?php
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if ($total_page > 1) {
                ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="<?= href('customer', 'index', ['page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $total_page; $i++) {
                                # code...
                            ?>
                                <li class="page-item"><a class="page-link" href="<?= href('customer', 'index', ['page' => $i]) ?>"><?= $i ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= href('customer', 'index', ['page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>