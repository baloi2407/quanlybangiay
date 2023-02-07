<div class="row">
    <div class="col-md-12 ">
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật nhà sản xuất</h2>
                <div class="clearfix"></div>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= href('supplier', 'update', ['id' => $item->id]) ?>" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <label for="">Hình ảnh nhà cung cấp</label><br>
                                    <img class="img-fluid avatar-view" src="<?= getavatar($item->image) ?>" alt="Avatar" title="Change the avatar">
                                    <input type="file" name="image" class="form-control" value="<?= $item->image ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal form-label-left">
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Tên nhà cung cấp <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" value="<?= $item->name ?? '' ?>" name="name" placeholder="Nhập tên ">
                                        <p class="text-danger"><?= $us_msg ?? '' ?></p>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="email" class="form-control" placeholder="Nhập email" value="<?= $item->email ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Phone <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?= $item->phone ?? '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Địa chỉ <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea name="address" class="form-control" placeholder="Nhập địa chỉ"><?= $item->address ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Mô tả</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="form-control" name="form-control" placeholder="Nhập mô tả"><?= $item->summary ?? '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Trạng thái <span class="text-danger">(*)</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="status" class="form-control">
                                            <option value="<?= $item->status ?>"><?= $item->status == 1 ? 'Hoạt động' : 'Khóa' ?></option>
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Khóa</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
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
                                    <label class="control-label col-md-3 col-sm-3 ">keyword</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="keyword" value="<?= $item->keyword ?? '' ?>" name="keyword">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="description" value="<?= $item->description ?? '' ?>" name="description">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">title</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="title" value="<?= $item->title ?? '' ?>" name="title">
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
                        <div class="form-group">
                            <a href="<?= href('supplier', 'index') ?>" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <input type="submit" class="btn btn-success" value="Ghi" name="save">
                        </div>
                    </div>
                    <br>

                </div>
            </form>
        </div>
    </div>
</div>