<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Báo cáo số lượng sản phẩm bán được</h2>

                <div class="clearfix"></div>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?= href('statistic', 'index') ?>" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Từ: </label>
                            <input type="date" name="from" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Đến: </label>
                            <input type="date" name="to" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Thao tác</label><br>
                            <input type="submit" class="btn btn-success" value="Tìm kiếm" name="save">
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>