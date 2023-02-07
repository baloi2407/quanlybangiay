<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật sản phẩm</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= $alert ?? '' ?>
                <form class="form-horizontal form-label-left" method="post" action="<?= href('news', 'update', ['id' => $item->id]) ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <label class="control-label">Hình ảnh sản phẩm<span class="text-danger">(*)</span></label><br>
                                    <img class="img-fluid avatar-view" src="<?= getavatar($item->image,'public/uploads/news_images/') ?>" alt="Avatar" title="Change the avatar">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Tên <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= $item->name ?? '' ?>" name="name" placeholder="Nhập tên sản phẩm">
                                        <p class="text-danger"><?= $us_msg ?? '' ?></p>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Nội dung </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="content" class="form-control" placeholder="Nội dung"><?= $item->content ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Mô tả</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="summary" class="form-control" placeholder="Mô tả"><?= $item->summary ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Danh mục <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            <option selected value="<?= $item->category_id ?>"> <?= $cate_name = (new news_category())->_item($item->category_id)->name ?>
                                            </option>
                                            <?php
                                            foreach ($list_cat as $cat) {
                                                if ($cat->id != $item->category_id) {
                                            ?>
                                                    <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="status" id="" class="form-control">
                                            <option value="<?= $item->status ?>" selected><?= $item->status == 1 ? 'Hoạt động' : 'Khóa' ?></option>
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Khóa</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-3 ">Hình ảnh liên quan <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <?php
                                        foreach ($list_image as $item_image) {
                                        ?>
                                            <img class="img-fluid avatar-view" src="<?= getavatar($item_image->image,'public/uploads/news_images/') ?>" alt="Avatar" title="Change the avatar">
                                        <?php
                                        }
                                        ?>
                                        <input type="file" class="form-control mt-2" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">alias</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="alias" value="<?= $item->alias ?? '' ?>" name="alias">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Keyword</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="keyword" value="<?= $item->keyword ?? '' ?>" name="keyword">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tittle</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="tittle" value="<?= $item->tittle ?? '' ?>" name="tittle">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="description" class="form-control" placeholder="description"><?= $item->description ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Image share</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="file" class="form-control" value="" name="image_share">
                                        <img class="img-fluid avatar-view" src="<?= getavatar($item->image_share,'public/uploads/news_images/') ?>" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="<?= href('news', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <input type="submit" class="btn btn-success" value="Ghi" name="save">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>