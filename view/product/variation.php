<div class="row">
    <div class="col-md-12">
        <a href="<?= href('product', 'create_variation', ['id' => $_GET['id']]) ?>" class="btn btn-large btn-primary">Thêm kiểu loại</a>
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách kiểu loại - <?= $item->name ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Size</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!count($list)) {
                            echo '<td colspan="4">Chưa có kiểu loại</td>';
                        } else {
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $item->size ?></th>
                                    <td><?= $item->quantity ?></td>
                                    <td><?= $item->status == 1 ? '<span class="badge badge-success">Hoạt động</span>' : '<span class="badge badge-dark">Khóa</span>' ?>
                                    </td>
                                    <td class="w-25">
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('product', 'edit_variation', ['id' => $item->product_id, 'size' => $item->size]) ?>" role="button">Sửa</a>
                                        <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('product', 'delete_variation', ['id' => $item->product_id, 'size' => $item->size]) ?>" role="button">Xóa</a>
                                    </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <?php
        if ($total_page > 1) {
        ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="<?= href('product', 'variation', ['id' => $item->id, 'page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $total_page; $i++) {
                        # code...
                    ?>
                        <li class="page-item"><a class="page-link" href="<?= href('product', 'variation', ['id' => $item->id, 'page' => $i]) ?>"><?= $i ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= href('product', 'variation', ['id' => $item->id, 'page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
        }
        ?>
        <a href="<?= href('product', 'index') ?>" class="btn btn-large btn-primary">Quay về</a>

    </div>
</div>