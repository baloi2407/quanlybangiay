<div class="row">
    <div class="col-md-12">
        <?= $msg ?? '' ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm sản phẩm </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <td><?= $item->name ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('product', 'create',['id_cat'=>$item->id]) ?>" role="button">Thêm sản phẩm</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>            
            </div>
        </div>
        <a href="<?= href('product', 'index') ?>" class="btn btn-large btn-primary">Quay về</a>
    </div>
</div>