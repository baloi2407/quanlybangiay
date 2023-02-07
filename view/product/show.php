<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $item->name ?></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Tìm kiếm</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">

                <div class="x_content">

                    <div class="col-md-7 col-sm-7 ">
                        <div class="product-image">
                            <img src="<?= getavatar($item->image) ?? '' ?>" alt="..." />
                        </div>
                        <div class="product_gallery">
                            <?php
                            foreach ($list_image as $images) {
                            ?>
                                <a>
                                    <img src="<?= getavatar($images->image) ?? '' ?>" alt="..." />
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                        <h3 class="prod_title"><?= $item->name ?></h3>
                        <p><?= $item->summary ?></p>
                        <br />

                        <div class="">
                            <h2><small>Các size của sản phẩm</small></h2>
                            <ul class="list-inline prod_size display-layout">
                                <?php
                                foreach ($list_element as $sizes) {
                                ?>
                                    <li>
                                        <button class="btn btn-primary"><?= $sizes->size ?></button>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <br />

                        <div class="">
                            <div class="product_price">
                                <h1 class="price"><?= number_format($item->price).'đ' ?></h1>
                                <span class="price-tax">Giảm giá: <?= number_format($item->promo).'đ' ?></span>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= href('product', 'index') ?>" class="btn btn-large btn-primary">Quay về</a>
        </div>
    </div>
</div>