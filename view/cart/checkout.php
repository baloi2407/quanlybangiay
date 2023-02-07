<div class="row">
    <div class="col-md-12">
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Đơn hàng của bạn</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content table-responsive">
                <form action="<?= href('cart', 'checkoutpost') ?>" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Size</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá tiền</th>
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
                                    <td><?= $item['buyqty'] ?></td>
                                    <input type="hidden" value="<?= $item['buyqty'] ?>" name="qty[<?= $item['id'] ?>]">
                                    <td><?= number_format($item['price']) . 'đ' ?></td>
                                    <input type="hidden" value="<?= $item['price'] ?>" name="price">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 mt-2">Tên tài khoản <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" name="username" placeholder="Nhập Tên tài khoản">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 ">Trạng thái đơn hàng <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <select name="order_status" id="" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                <option value="0">Chưa xác nhận</option>
                                <option value="1">Đã xác nhận</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3  ">Trạng thái <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 mt-2 ">
                            <select name="status" id="" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                <option value="0">Khóa</option>
                                <option value="1">Hoạt động</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 ">Note</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <textarea type="text" class="form-control" name="notes" placeholder="Ghi chú(nếu có)"></textarea>
                        </div>
                    </div>
                    <h4 class="text-dark">Tổng tiền: <?= number_format($total) . 'đ' ?></h4>
                    <input type="hidden" value="<?= $total ?>" name="total">
                    <a href="<?= href('cart', 'index') ?>" class="btn btn-large btn-primary">Tiếp tục mua</a>
                    <input type="submit" name="checkout" value="Thanh toán" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
</div>