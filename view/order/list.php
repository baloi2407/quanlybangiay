<div class="row">
    <div class="col-md-12">
        <?php
        if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
        ?>
            <a href="<?= href('cart', 'index') ?>" class="btn btn-large btn-primary">Thêm đơn hàng</a>
        <?php
        }
        ?>
        <?= $msg ?? '' ?>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group row pull-right top_search">
                <div class="input-group">
                    <form action="<?= href('order', 'index') ?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Gõ mã đơn hàng" name="keyword">
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
                <h2>Danh sách đơn hàng</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!count($list)) {
                            echo '<td colspan="8">Chưa có đơn hàng</td>';
                        } else {
                            foreach ($list as $item) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $item->id ?></th>
                                    <td><?= $item->code ?></td>
                                    <td><?php $customer = (new customer())->_item($item->customer_id);
                                        echo  $customer->firstname . ' ' . $customer->lastname  ?></td>
                                    <td><?= (new customer())->_item($item->customer_id)->address ?></td>
                                    <td><?= (new customer())->_item($item->customer_id)->phone ?></td>
                                    <td><?= number_format($item->total_amount) . 'đ' ?></td>
                                    <td><?= $item->order_status == 1 ? '<span class="badge badge-success">Đã xác nhận</span>' : '<span class="badge badge-dark">Chưa xác nhận</span>' ?>
                                    <td>
                                        <?php
                                        if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                                        ?>
                                            <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('order', 'edit', ['id' => $item->id]) ?>" role="button">Sửa</a>
                                            <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" id="" class="btn btn-danger btn-sm" href="<?= href('order', 'delete', ['id' => $item->id]) ?>" role="button">Xóa</a>

                                        <?php
                                        }
                                        ?>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('orderdetail', 'index', ['id' => $item->id]) ?>" role="button">Chi tiết</a>
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
                                <a class="page-link" href="<?= href('order', 'index', ['page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $total_page; $i++) {
                                # code...
                            ?>
                                <li class="page-item"><a class="page-link" href="<?= href('order', 'index', ['page' => $i]) ?>"><?= $i ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= href('order', 'index', ['page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php
                }
                if (checkgroupshow('Manager') || checkgroupshow('Creator')) {
                ?>
                    <a href="<?= href('cart', 'cart') ?>" class="btn btn-primary">Giỏ hàng</a>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>