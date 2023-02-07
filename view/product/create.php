<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm sản phẩm</h2>

                <div class="clearfix"></div>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= href('product', 'store', ['id_cat' => $_GET['id_cat']]) ?>" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <label for="">Hình ảnh sản phẩm</label><br>
                                    <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?? 'Chưa có hình ảnh' ?>" alt="Avatar" title="Change the avatar">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tên <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= post('name') ?? '' ?>" name="name" placeholder="Nhập tên sản phẩm">
                                        <p class="text-danger"><?= $us_msg ?? '' ?></p>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Giá <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Giá tiền " value="<?= post('price') ?? '' ?>" name="price">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Giảm giá </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Giá tiền giảm giá" value="<?= post('promo') ?? '' ?>" name="promo">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Nội dung </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="content" class="form-control" placeholder="Nội dung"><?= post('content') ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">SKU <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="SKU của sản phẩm" value="<?= post('sku') ?? '' ?>" name="sku">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Mô tả</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="summary" class="form-control" placeholder="Mô tả"><?= post('summary') ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Danh mục phụ <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 pt-2">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            <?php
                                            foreach ($list_dm as $dm) {
                                            ?>
                                                <option value="<?= $dm->id ?>"><?= $dm->name ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Hãng sản xuất <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="supplier_id" id="" class="form-control">
                                            <option value="">Chọn hãng</option>
                                            <?php
                                            foreach ($list_sup as $sup) {
                                            ?>
                                                <option value="<?= $sup->id ?>"><?= $sup->name ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="status" id="" class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Khóa</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Hình ảnh liên quan <span class="text-danger"> Tối đa 4 hình</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="file" class="form-control" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">alias</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="alias" value="<?= post('alias') ?? '' ?>" name="alias">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">keyword</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="keyword" value="<?= post('keyword') ?? '' ?>" name="keyword">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="description" value="<?= post('description') ?? '' ?>" name="description">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">title</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="title" value="<?= post('title') ?? '' ?>" name="title">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">image share</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="file" class="form-control" name="image_share">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="<?= href('product', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <input type="submit" class="btn btn-success" value="Ghi" name="save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>