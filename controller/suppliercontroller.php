<?php
class suppliercontroller extends controller
{
    function index()
    {
        $model = new supplier();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('supplier', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('supplier/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm nhà sản xuất
    function searchpost()
    {
        $model = new supplier();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('supplier/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // thêm nhà sản xuất
    function create()
    {
        checkgroup2($_SESSION['group_name']);
        $this->render('supplier/create.php');
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new supplier();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên nhà sản xuất
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên nhà sản xuất.<br>';
            }
            // Kiểm tra email
            if (unique_value($list, 'email', post('email'))) { // email tồn tại hay chưa
                $flag = false;
                $content .= 'Email đã tồn tại.<br>';
            }
            if (!filter_var(post('email'), FILTER_VALIDATE_EMAIL)) { //  email hợp lệ
                $flag = false;
                $content .= 'Email không hợp lệ.<br>';
            }
            // kiểm tra số điện thoại
            if (!is_numeric(post('status')) && strlen(post('phone')) < 9) {
                $flag = false;
                $content .= 'Chưa nhập số điện thoại.<br>';
            }
            // kiểm tra địa chỉ
            if (strlen(post('address')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập địa chỉ.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                $image_share = myupload($_FILES['image_share'], 'public/uploads/images/', $er);
                $model->insert(
                    [
                        'name' => post('name'), 'email' => post('email'), 'phone' => post('phone'), 'address' => post('address'), 'summary' => post('summary'), 'image' => $image, 'description' => post('description'),
                        'alias' => post('alias'), 'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                    ]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('supplier/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // cập nhật nhà sản xuất
    function edit()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new supplier();
        $item = $model->_item($_GET['id']);
        $this->render('supplier/update.php', ['item' => $item]);
    }
    function update()
    {
        //action post 
        $model = new supplier();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $item = $model->_item($_GET['id']);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên nhà sản xuất
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên nhà sản xuất.<br>';
            }
            // Kiểm tra email
            if (unique_value($list, 'email', post('email'))) { // email tồn tại hay chưa
                $flag = false;
                $content .= 'Email đã tồn tại.<br>';
            }
            if (!filter_var(post('email'), FILTER_VALIDATE_EMAIL)) { //  email hợp lệ
                $flag = false;
                $content .= 'Email không hợp lệ.<br>';
            }
            // kiểm tra số điện thoại
            if (!is_numeric(post('status')) && strlen(post('phone')) < 9) {
                $flag = false;
                $content .= 'Chưa nhập số điện thoại.<br>';
            }
            // kiểm tra địa chỉ
            if (strlen(post('address')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập địa chỉ.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                $image_share = myupload($_FILES['image_share'], 'public/uploads/images/', $er);
                if (!$image) {
                    $model->_update(
                        [
                            'name' => post('name'), 'email' => post('email'), 'phone' => post('phone'), 'address' => post('address'), 'summary' => post('summary'), 'description' => post('description'),
                            'alias' => post('alias'), 'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                        ],
                        ['id' => $_GET['id']]
                    );
                } else {
                    $model->_update(
                        [
                            'name' => post('name'), 'email' => post('email'), 'phone' => post('phone'), 'address' => post('address'), 'summary' => post('summary'), 'description' => post('description'),
                            'alias' => post('alias'), 'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share, 'image' => $image
                        ],
                        ['id' => $_GET['id']]
                    );
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('supplier/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // xóa nhà sản xuất
    function delete()
    {
        checkgroup2($_SESSION['group_name']);
        $model = new supplier();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $msg = msg('Xóa thất bại');
        if ($model->delete($_GET['id'])) {
            $list = $model->_list([], $limit, $offset);
            $msg = msg('Xóa thành công', 'success');
        }
        $this->render('supplier/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
}
