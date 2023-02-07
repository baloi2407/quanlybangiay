<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm danh mục con</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" action="<?= href('newscategory', 'store_child', ['id' => $_GET['id']]) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <div class="col-md-3">
                            <label class="control-label col-md-3 col-sm-3 mt-2">Hình ảnh</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label col-md-3 col-sm-3 ">Tên danh mục <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="<?= post('name') ?? '' ?>">
                            </div>

                            <label class="control-label col-md-3 col-sm-3 mt-2">Mô tả</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <textarea name="summary" class="form-control" placeholder="Nhập mô tả"><?= post('summary') ?? '' ?></textarea>
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
                        <div class="col-md-3">
                            <label class="control-label col-md-3 col-sm-3 mt-2">alias</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="alias" name="alias" value="<?= post('alias') ?? '' ?>">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">keyword</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="keyword" name="keyword" value="<?= post('keyword') ?? '' ?>">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">description</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <textarea name="description" class="form-control" placeholder="description" value="<?= post('description') ?? '' ?>"></textarea>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 mt-2">title</label>
                            <div class="col-md-9 col-sm-9 mt-2">
                                <input type="text" class="form-control" placeholder="title" name="title" value="<?= post('title') ?? '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <a href="<?= href('newscategory', 'index_child', ['id' => $_GET['id']]) ?>" type="button" class="btn btn-primary">Quay về</a>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success" name="save">Tạo danh mục</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>