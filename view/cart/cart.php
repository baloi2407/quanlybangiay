<div class="row">
    <div class="col-md-12">
        <?= $msg ?? '' ?>
        
        <div class="x_panel">
            <div class="x_title">
                <h2>Giỏ hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">
                <form action="<?= href('cart', 'updatecart') ?>" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Size</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($list as $item) {
                                $amount = $item['price'] * $item['buyqty'];
                                $total +=  $amount;
                            ?>
                                <tr>
                                    <th scope="row"><?= $item['id'] ?></th>
                                    <input type="hidden" value="<?= $item['id'] ?>" name="id">
                                    <td class="w-25"><?= $item['name'] ?></td>
                                    <td><?= $item['size'] ?></td>
                                    <input type="hidden" value="<?= $item['size'] ?>" name="size">
                                    <td><input type="number" value="<?= $item['buyqty'] ?>" name="qty[<?= $item['id'] ?>]"></td>
                                    <td><?= number_format($item['price']) . 'đ' ?></td>
                                    <input type="hidden" value="<?= $item['price'] ?>" name="price">
                                    </td>
                                    <td class="w-25">
                                        <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('cart', 'deletecart', ['id' => $item['id']]) ?>" role="button">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    <h4 class="text-dark">Tổng tiền: <?= number_format($total).'đ' ?></h4>
                    <input type="submit" class="btn btn-primary" value="Cập nhật giỏ" name="updatecart">
                    <a href="<?= href('cart', 'index') ?>" class="btn btn-large btn-primary">Tiếp tục mua</a>
                    <a href="<?= href('cart', 'checkout') ?>" class="btn btn-large btn-primary">Thanh toán</a>
                </form>

            </div>
        </div>
    </div>
</div>