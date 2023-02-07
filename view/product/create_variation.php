<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm thuộc tính sản phẩm</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('product', 'store_variation', ['id' => $_GET['id']]) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 mt-2">Size <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Nhập size sản phẩm" name="size" value="<?= post('size') ?? '' ?>">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Màu sắc </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Nhập màu sắc sản phẩm" name="color" value="<?= post('color') ?? '' ?>">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Số lượng <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Nhập số lượng sản phẩm" name="quantity" value="<?= post('quantity') ?? '' ?>">
                        </div>

                        <label class="control-label col-md-3 col-sm-3 mt-2">Chú thích</label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <textarea name="note" class="form-control" placeholder="Nhập mô tả"><?= post('note') ?? '' ?></textarea>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 mt-2">Trạng thái <span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-9 mt-2">
                            <select name="status" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                <option value="0">Khóa</option>
                                <option value="1">Hoạt động</option>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="<?= href('product', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success" name="save">Ghi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>