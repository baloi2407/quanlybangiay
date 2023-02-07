<?php
class productcontroller extends controller
{
    // Danh sách sản phẩm
    function index()
    {
        $model = new product();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('product', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('product/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm sản phẩm
    function searchpost()
    {
        $model = new product();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('product/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // Danh sách danh mục có trạng thái hoạt động - Chọn danh mục để thêm sản phâm
    function category()
    {
        $model = new category();
        $list = $model->_list(['parent_id' => 0, 'status' => 1]);
        $this->render('product/category.php', ['list' => $list]);
    }
    // Thêm sản phẩm
    function create()
    {
        checkgroup2($_SESSION['group_name']);
        $model2 = new category();
        $list_dm = $model2->_list(['parent_id' => $_GET['id_cat']]);
        $model3 = new supplier();
        $list_sup = $model3->_list();
        if (isset($_GET['id_cat']) && $_GET['id_cat'] > 0)
            $this->render('product/create.php', ['list_dm' => $list_dm, 'list_sup' => $list_sup]);
        else redirect(href('product', 'index'));
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new product();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $model_pro_image = new pro_image();
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên sản phẩm
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên sản phẩm.<br>';
            }
            // kiểm tra sku
            if (strlen(post('sku')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập SKU.<br>';
            }
            if (unique_value($list, 'sku', post('sku'))) {
                $flag = false;
                $content .= 'SKU bị trùng.<br>';
            }
            // kiểm tra giá tiền giảm giá
            if (strlen(post('promo')) > 1 && !is_numeric(post('promo'))) {
                $flag = false;
                $content .= 'Nhập sai định dạng giá tiền giảm giá.<br>';
            }
            // kiểm tra giá tiền
            if (!is_numeric(post('price'))) {
                $flag = false;
                $content .= 'Nhập sai định dạng giá tiền.<br>';
            }
            // kiểm tra hãng sản xuất
            if (!is_numeric(post('supplier_id'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng hãng sản xuất.<br>';
            }
            // kiểm tra danh mục
            if (!is_numeric(post('category_id'))) {
                $flag = false;
                $content .= 'Chưa chọn danh mục.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            // kiểm tra hình ảnh liên quan tối đa 4 hình
            if (count($_FILES['images']['name']) > 4) {
                $flag = false;
                $content .= 'Tối đa 4 hình ảnh liên quan';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                $image_share = myupload($_FILES['image_share'], 'public/uploads/images/', $er);
                $model->insert(
                    [
                        'name' => post('name'), 'price' => post('price'), 'sku' => post('sku'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                        'supplier_id' => post('supplier_id'), 'image' => $image, 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                        'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share,
                    ]
                );
                $product_id = $model->last_id();
                // thêm hình ảnh liên quan cho sản phẩm
                if (isset($_FILES['images']['name']) && $_FILES['images']['name']) {
                    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                        $images = myuploads($_FILES['images'], 'public/uploads/images/');
                        $model_pro_image->insert(
                            [
                                'product_id' => $product_id->last_id, 'image' => $images[$i]['path']
                            ]
                        );
                    }
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content, 'danger');
            }
            $this->render('product/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // Cập nhật sản phẩm
    function edit()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new product();
        $item = $model->_item($_GET['id']);
        $model2 = new category();
        $item_category = $model2->_item($item->category_id);
        $list_cat = $model2->_list(['parent_id' => $item_category->parent_id]);
        $model3 = new supplier();
        $list_sup = $model3->_list();
        $model4 = new pro_image();
        $list_image = $model4->list_image($_GET['id']);
        $this->render('product/update.php', ['item' => $item, 'list_sup' => $list_sup, 'list_cat' => $list_cat, 'list_image' => $list_image]);
    }
    function update()
    {
        //action post 
        $model = new product();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $model_pro_image = new pro_image();
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên sản phẩm
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên sản phẩm.<br>';
            }
            // kiểm tra sku
            if (strlen(post('sku')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập SKU.<br>';
            }
            // kiểm tra giá tiền giảm giá
            if (strlen(post('promo')) > 1 && !is_numeric(post('promo'))) {
                $flag = false;
                $content .= 'Nhập sai định dạng giá tiền giảm giá.<br>';
            }
            // kiểm tra giá tiền
            if (!is_numeric(post('price'))) {
                $flag = false;
                $content .= 'Nhập sai định dạng giá tiền.<br>';
            }
            // kiểm tra danh mục
            if (!is_numeric(post('category_id'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng danh mục.<br>';
            }
            // kiểm tra hãng sản xuất
            if (!is_numeric(post('supplier_id'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng hãng sản xuất.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng trạng thái.<br>';
            }
            // kiểm tra hình ảnh liên quan tối đa 4 hình
            if (count($_FILES['images']['name']) > 5) {
                $flag = false;
                $content .= 'Tối đa 4 hình ảnh liên quan';
            }


            if ($flag) {
                // kiểm tra hình ảnh 
                if (isset($_FILES['image']['name']) && $_FILES['image']['name']) {
                    $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                    // thêm hình ảnh liên quan cho sản phẩm
                    if (isset($_FILES['images']['name']) && $_FILES['images']['name']) {
                        $images = myuploads($_FILES['images'], 'public/uploads/images/');
                        for ($i = 0; $i < count($images); $i++) {
                            $model_pro_image->insert(
                                [
                                    'product_id' => $_GET['id'], 'image' => $images[$i]['path']
                                ]
                            );
                        }
                    }
                    if (isset($_FILES['image_share']['name']) && $_FILES['image_share']['name']) {
                        // kiểm tra hình ảnh seo
                        $image_share = myupload($_FILES['image_share'], 'public/uploads/images/', $er);
                        // tiến hành update
                        $model->_update(
                            [
                                'name' => post('name'), 'price' => post('price'), 'sku' => post('sku'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'supplier_id' => post('supplier_id'), 'image' => $image, 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                            ],
                            ['id' => $_GET['id']]
                        );
                    } else {
                        $model->_update(
                            [
                                'name' => post('name'), 'price' => post('price'), 'sku' => post('sku'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'supplier_id' => post('supplier_id'), 'image' => $image, 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status')
                            ],
                            ['id' => $_GET['id']]
                        );
                    }
                } else {
                    if (isset($_FILES['image_share']['name']) && $_FILES['image_share']['name']) {
                        // kiểm tra hình ảnh seo
                        $image_share = myupload($_FILES['image_share'], 'public/uploads/images/', $er);
                        // tiến hành update
                        $model->_update(
                            [
                                'name' => post('name'), 'price' => post('price'), 'sku' => post('sku'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'supplier_id' => post('supplier_id'), 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                            ],
                            ['id' => $_GET['id']]
                        );
                    } else {
                        $model->_update(
                            [
                                'name' => post('name'), 'price' => post('price'), 'sku' => post('sku'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'supplier_id' => post('supplier_id'), 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status')
                            ],
                            ['id' => $_GET['id']]
                        );
                    }
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
        }

        $this->render('product/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
    // Xem sản phẩm
    function show()
    {
        $model = new product();
        $item = $model->_item($_GET['id']);
        $list_element = $model->get_elements($_GET['id']);
        $model4 = new pro_image();
        $list_image = $model4->list_image($_GET['id']);
        $this->render('product/show.php', ['item' => $item, 'list_element' => $list_element, 'list_image' => $list_image]);
    }
    // Xóa sản phẩm
    function delete()
    {
        checkgroup2($_SESSION['group_name']);
        $model = new product();
        if ($model->delete($_GET['id'])) {
            $msg = msg('Xóa thành công', 'success');
            $model = new product();
        } else {
            $msg = msg('Xóa không thành công', 'danger');
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('product/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg]);
    }
    // Danh sách kiểu loại của sản phẩm
    function variation()
    {
        $model = new pro_element();
        $item = (new product())->_item($_GET['id']);
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list(['product_id' => $_GET['id']], $limit, $offset);

        $list_result = $model->_list(['product_id' => $_GET['id']]);
        total_page($limit, $list_result, $total_page);
        $this->render('product/variation.php', ['list' => $list, 'total_page' => $total_page, 'item' => $item]);
    }
    // Thêm kiểu loại cho sản phẩm
    function create_variation()
    {
        checkgroup2($_SESSION['group_name']);
        $this->render('product/create_variation.php');
    }
    function store_variation()
    {
        $model = new pro_element();
        $item = (new product())->_item($_GET['id']);

        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list(['product_id' => $_GET['id']], $limit, $offset);

        $list_result = $model->_list(['product_id' => $_GET['id']]);
        total_page($limit, $list_result, $total_page);

        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;
            // kiểm tra size
            $sizes = $model->_list(['product_id' => $_GET['id']]);
            if (strlen(post('size')) < 1) {
                $flag = false;
                $content = 'Chưa nhập size.<br>';
            }
            foreach ($sizes as $item) {
                if ($item->size == post('size')) {
                    $flag = false;
                    $content .= 'Size đã tồn tại.<br>';
                }
            }

            // kiểm tra số lượng
            if (strlen(post('quantity')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập số lượng.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            if ($flag) {
                $model->insert(
                    [
                        'product_id' => $_GET['id'], 'size' => post('size'), 'color' => post('color'), 'quantity' => post('quantity'), 'note' => post('note'), 'status' => post('status')
                    ]
                );
                $list = $model->_list(['product_id' => $_GET['id']], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content, 'danger');
            }
            $this->render('product/variation.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page, 'item' => $item]);
        }
    }
    // Cập nhật kiểu loại
    function edit_variation()
    {
        checkgroup2($_SESSION['group_name']);
        $model = new pro_element();
        $item = $model->_element($_GET['id'], $_GET['size']);
        $this->render('product/update_variation.php', ['item' => $item]);
    }
    function update_variation()
    {
        $model = new pro_element();
        $item = (new product())->_item($_GET['id']);
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list_variation = $model->_list(['product_id' => $_GET['id']], $limit, $offset);

        $list_result = $model->_list(['product_id' => $_GET['id']]);
        total_page($limit, $list_result, $total_page);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;
            // kiểm tra size
            if (strlen(post('size')) < 1) {
                $flag = false;
                $content = 'Chưa nhập size.<br>';
            }
            // kiểm tra số lượng
            if (strlen(post('quantity')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập số lượng.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            if ($flag) {
                $model->_update(
                    [
                        'size' => post('size'), 'quantity' => post('quantity'), 'note' => post('note'), 'status' => post('status')
                    ],
                    ['product_id' => $_GET['id'], 'size' => $_GET['size']]
                );
                $list_variation = $model->_list(['product_id' => $_GET['id']], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content, 'danger');
            }
            $this->render('product/variation.php', ['list' => $list_variation, 'msg' => $msg, 'total_page' => $total_page, 'item' => $item]);
        }
    }
    function delete_variation()
    {
        checkgroup2($_SESSION['group_name']);
        $model = new pro_element();
        if ($model->_del_ele($_GET['id'], $_GET['size'])) {
            $msg = msg('Xóa thành công', 'success');
            $model = new pro_element();
        } else {
            $msg = msg('Xóa không thành công', 'danger');
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list(['product_id' => $_GET['id']], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('product/variation.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg]);
    }
}
