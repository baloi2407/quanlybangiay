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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Số lượng bán ra</th>
                                <th>Tổng thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($list) < 1) {
                                echo '<tr><td colspan="4">Không tìm thấy</td></tr>';
                            } else {
                                foreach ($list as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item->name ?></td>
                                        <td><?= $item->size ?></td>
                                        <td><?= $item->qtybuy ?></td>
                                        <td><?= number_format($item->price).'đ' ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if ($total_page > 1) {
                    ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('statistic', 'search', ['from' => $_GET['from'] ?? '', 'to' => $_GET['to'] ?? '', 'page' => (($_GET['page'] ?? 1) - 1) < 1 ? 1 : ($_GET['page'] ?? 1) - 1 ?? 1]) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    # code...
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= href('statistic', 'search', ['from' => $_GET['from'] ?? '', 'to' => $_GET['to'] ?? '', 'page' => $i]) ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= href('statistic', 'search', ['from' => $_GET['from'] ?? '', 'to' => $_GET['to'] ?? '', 'page' => (($_GET['page'] ?? 1) + 1) > $total_page ? 1 : ($_GET['page'] ?? 1) + 1 ?? 1]) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>