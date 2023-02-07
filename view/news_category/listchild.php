<div class="row">
    <div class="col-md-12">
        <a href="<?= href('newscategory', 'create_child', ['id' => $_GET['id']]) ?>" class="btn btn-large btn-primary">Thêm danh mục</a>
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách danh mục con</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!count($list)) {
                            echo '<td colspan="3">Chưa có sản phẩm</td>';
                        } else {
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $item->id ?></th>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->status == 1 ? '<span class="badge badge-success">Hoạt động</span>' : '<span class="badge badge-dark">Khóa</span>' ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('newscategory', 'edit_child', ['id' => $item->id]) ?>" role="button">Sửa</a>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('newscategory', 'index_child', ['pid' => $_GET['id'], 'id' => $item->id]) ?>" role="button">Danh mục con</a>
                                        <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('newscategory', 'delete', ['id' => $item->id, 'pid' => $item->parent_id]) ?>" role="button">Xóa</a>
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
                ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="<?= href('newscategory', 'index_child', ['id' => $_GET['id'], 'page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $total_page; $i++) {
                                # code...
                            ?>
                                <li class="page-item"><a class="page-link" href="<?= href('newscategory', 'index_child', ['id' => $_GET['id'], 'page' => $i]) ?>"><?= $i ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= href('newscategory', 'index_child', ['id' => $_GET['id'], 'page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
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