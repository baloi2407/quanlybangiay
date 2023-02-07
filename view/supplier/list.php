<div class="row">
    <div class="col-md-12">
        <?php
        if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
        ?>
            <a href="<?= href('supplier', 'create') ?>" class="btn btn-large btn-primary">Thêm nhà cung cấp</a>
        <?php
        }
        ?>
        <?= $msg ?? '' ?>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                <div class="input-group">
                    <form action="<?= href('supplier', 'index') ?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Gõ tên nhà sản xuất" name="keyword">
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
                <h2>Danh sách nhà cung cấp</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!count($list)) {
                            echo '<td colspan="6">Chưa có nhà cung cấp</td>';
                        } else {
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $item->id ?></th>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->email ?></td>
                                    <td><?= $item->phone ?></td>
                                    <td><?= $item->status == 1 ? '<span class="badge badge-success">Hoạt động</span>' : '<span class="badge badge-dark">Khóa</span>' ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                        ?>
                                            <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('supplier', 'edit', ['id' => $item->id]) ?>" role="button">Sửa</a>
                                            <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('supplier', 'delete', ['id' => $item->id]) ?>" role="button">Xóa</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if ($total_page > 1) {
                    if (isset($_GET['action']) && $_GET['action'] == 'searchpost') {
                ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?= href(
                                                                    'supplier',
                                                                    'searchpost',
                                                                    [
                                                                        'keyword' => $_GET['keyword'],
                                                                        'page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1
                                                                    ]
                                                                ) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    # code...
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= href(
                                                                                            'supplier',
                                                                                            'searchpost',
                                                                                            [
                                                                                                'keyword' => $_GET['keyword'],
                                                                                                'page' => $i
                                                                                            ]
                                                                                        ) ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= href(
                                                                    'supplier',
                                                                    'searchpost',
                                                                    [
                                                                        'keyword' => $_GET['keyword'],
                                                                        'page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1
                                                                    ]
                                                                ) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php
                    } else {
                    ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('supplier', 'index', ['page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    # code...
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= href('supplier', 'index', ['page' => $i]) ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('supplier', 'index', ['page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>