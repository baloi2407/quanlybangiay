<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm nhóm quyền</h2>

                <div class="clearfix"></div>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= href('group', 'store') ?>" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tên nhóm<span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= post('name') ?? '' ?>" name="name" placeholder="Nhập tên nhóm">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tóm tắt</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="summary" class="form-control" placeholder="Tóm tắt nhóm quyền"><?= post('summary') ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="status" class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Khóa</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="<?= href('group', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <input type="submit" class="btn btn-success" value="Ghi" name="save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>