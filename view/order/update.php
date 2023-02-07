<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật đơn hàng</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('order', 'update', ['id' => $item->id])  ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">ID</label>
                        <div class="col-md-9 col-sm-9">
                            <input type="text" class="form-control" value="<?= $item->id ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Mã đơn hàng</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= $item->code ?>" readonly>
                        </div>

                        <label class="control-label col-md-3 col-sm-3 mt-2">Mã khách hàng</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= $item->customer_id ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Tổng tiền</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= number_format($item->total_amount) . 'đ' ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Coupon</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= $item->coupon ?? 0 ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Ngày tạo đơn</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= $item->order_date ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Thanh toán</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <input type="text" class="form-control" value="<?= $item->payment_method == 1 ? 'Thanh toán tiền mặt' : '' ?>" readonly>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 ">Trạng thái đơn hàng</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <select name="order_status" id="" class="form-control">
                                <option value="<?= $item->order_status ?>" selected><?= $item->order_status == 1 ? 'Đã xác nhận' : 'Chưa xác nhận' ?></option>
                                <option value="">Chọn trạng thái</option>
                                <option value="0">Chưa xác nhận</option>
                                <option value="1">Đã xác nhận</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3  ">Trạng thái</label>
                        <div class="col-md-9 col-sm-9 mt-2 ">
                            <select name="status" id="" class="form-control">
                                <option value="<?= $item->status ?>" selected><?= $item->status == 1 ? 'Hoat động' : 'Khóa' ?></option>
                                <option value="">Chọn trạng thái</option>
                                <option value="0">Khóa</option>
                                <option value="1">Hoạt động</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 ">Note</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <textarea type="text" class="form-control" name="notes" placeholder="Ghi chú(nếu có)"><?= $item->notes ?></textarea>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="<?= href('order', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success" name="save">Ghi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>