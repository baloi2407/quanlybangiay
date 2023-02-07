<div class="row">
    <div class="col-md-12">
        <a href="<?= href('mod', 'create') ?>" class="btn btn-large btn-primary">Thêm model</a>
        <?= $msg ?? '' ?>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                <div class="input-group">
                    <form action="<?= href('mod', 'index') ?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Gõ tên model" name="keyword">
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
                <h2>Danh sách model</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên model</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!count($list)) {
                            echo '<td colspan="6">Chưa có model</td>';
                        } else {
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $item->id ?></th>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->status == 1 ? '<span class="badge badge-success">Hoạt động</span>' : '<span class="badge badge-dark">Khóa</span>' ?>
                                    </td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('mod', 'edit', ['id' => $item->id]) ?>" role="button">Sửa</a>
                                        <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('mod', 'delete', ['id' => $item->id]) ?>" role="button">Xóa</a>
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
                                                                    'mod',
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
                                                                                            'mod',
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
                                                                    'mod',
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
                                    <a class="page-link" href="<?= href('mod', 'index', ['page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    # code...
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= href('mod', 'index', ['page' => $i]) ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('mod', 'index', ['page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
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