<div class="row">
    <div class="col-md-12">
        <?= $msg ?? '' ?>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                <div class="input-group">
                    <form action="<?= href('cart', 'index') ?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Gõ tên sản phẩm" name="keyword">
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
                <h2>Danh sách sản phẩm</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="row">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Size</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?= $item->element_id ?></th>
                                <td class="w-25"><?= $item->name ?></td>
                                <td><?= $item->size ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->status == 1 ? '<span class="badge badge-success">Hoạt động</span>' : '<span class="badge badge-dark">Khóa</span>' ?>
                                </td>
                                <td class="w-20"><?= $cate_name = (new category())->_item($item->category_id)->name ?></td>
                                <td class="w-25">
                                    <form action="<?= href('cart', 'addtocart') ?>" method="post">
                                    <input type="hidden" value="<?=$item->id?>" name="id">
                                    <input type="hidden" value="<?=$item->size?>" name="size">
                                    <input type="submit" value="Chọn" name="addcart" class="btn btn-primary btn-small">
                                </form>
                                </td>
                            </tr>
                        <?php
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
                                                                    'cart',
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
                                                                                            'cart',
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
                                                                    'cart',
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
                                    <a class="page-link" href="<?= href('cart', 'index', ['page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    # code...
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= href('cart', 'index', ['page' => $i]) ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('cart', 'index', ['page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
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