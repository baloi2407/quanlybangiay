<div class="row">
    <div class="col-md-12">
        <a href="<?= href('order', 'index') ?>" class="btn btn-large btn-primary">Thêm đơn hàng</a>
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Chi tiết đơn hàng - số <?= $_GET['id'] ?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Ghi chú</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?= ((new product())->_item($item->product_id))->name ?></th>
                                <td><?= $item->size ?></td>
                                <td><?= $item->qty ?></td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->note ?></td>
                                <td><?= $item->created_at ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>