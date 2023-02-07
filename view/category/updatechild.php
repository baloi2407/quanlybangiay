<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật danh mục</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('category', 'update_child', ['pid' => $item->parent_id, 'id' => $item->id]) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="form-horizontal form-label-left">
                                        <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?>" alt="Avatar" title="Change the avatar">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tên danh mục <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="<?= $item->name ?>">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 mt-2">Mô tả</label>
                                <div class="col-md-9 col-sm-9 mt-2">
                                    <textarea name="summary" class="form-control" placeholder="Nhập mô tả"><?= $item->summary ?></textarea>
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
                        </div>
                        <div class="col-md-3">
                            <label class="control-label col-md-3 col-sm-3 mt-2">alias</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="alias" name="alias" value="<?= $item->alias ?>">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">keyword</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="keyword" name="keyword" value="<?= $item->keyword ?>">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">description</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="description" name="description" value="<?= $item->description ?>">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">title</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="title" name="title" value="<?= $item->title ?>">
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <a href="<?= href('category', 'index_child', ['id' => $_GET['pid']]) ?>" type="button" class="btn btn-primary">Quay về</a>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success" name="save">Cập nhật danh mục</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>