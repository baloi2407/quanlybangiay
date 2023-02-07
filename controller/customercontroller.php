<?php
class customercontroller extends controller
{
    function index()
    {
        $model = new customer();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('customer', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $this->render('customer/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm tài khoản khách hàng
    function searchpost()
    {
        $model = new customer();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);

        $list_result = $model->_listsearch($_GET['keyword'], []);
        if (!count($list)) $msg = msg('Không tìm thấy');

        total_page($limit, $list_result, $total_page);
        $this->render('customer/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // tạo tài khoản khách hàng
    function create()
    {
        checkgroup2($_SESSION['group_name']);

        $this->render('customer/create.php');
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new customer();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;
            // kiểm tra tên 
            if (strlen(post('firstname')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập tên.<br>';
            }
            // kiểm tra họ
            if (strlen(post('lastname')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập họ.<br>';
            }
            // kiểm tra ngày sinh
            if (strlen(post('dob')) < 10) {
                $flag = false;
                $content .= 'Chưa nhập ngày sinh.<br>';
            }
            // kiểm tra giới tính
            if (!is_numeric(post('gender'))) {
                $flag = false;
                $content .= 'Chọn giới tính<br>';
            }
            // kiểm tra địa chỉ 
            if (strlen(post('address')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập vị trí.<br>';
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
            if (!is_numeric(post('phone')) && strlen(post('phone')) < 9) {
                $flag = false;
                $content .= 'Số điện thoại không hợp lệ.<br>';
            }
            // kiểm tra status
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            // kiểm tra mật khẩu
            if (strlen(post('password')) < 8) { // quá ngắn
                $flag = false;
                $content .= 'Mật khẩu quá ngắn.<br>';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                $model->insert(
                    [
                        'firstname' => post('firstname'), 'lastname' => post('lastname'), 'gender' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'),
                        'address' => post('address'), 'email' => post('email'), 'phone' => post('phone'),
                        'status' => post('status'), 'note' => post('note'),
                        'image' => $image, 'password' => post('password')
                    ]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('customer/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // cập nhật tài khoản khách hàng
    function edit()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new customer();
        $item = $model->_item($_GET['id']);
        $this->render('customer/update.php', ['item' => $item]);
    }
    function update()
    {
        //action post 
        $model = new customer();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;
            // kiểm tra tên 
            if (strlen(post('firstname')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập tên.<br>';
            }
            // kiểm tra họ
            if (strlen(post('lastname')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập họ.<br>';
            }
            // kiểm tra giới tính
            if (!is_numeric(post('gender'))) {
                $flag = false;
                $content .= 'Chọn giới tính<br>';
            }
            // kiểm tra địa chỉ 
            if (strlen(post('address')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập vị trí.<br>';
            }
            // Kiểm tra email
            if (!filter_var(post('email'), FILTER_VALIDATE_EMAIL)) { //  email hợp lệ
                $flag = false;
                $content .= 'Email không hợp lệ.<br>';
            }
            // kiểm tra số điện thoại
            if (!is_numeric(post('phone')) && strlen(post('phone')) < 9) {
                $flag = false;
                $content .= 'Số điện thoại không hợp lệ.<br>';
            }
            // kiểm tra status
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            // kiểm tra mật khẩu
            if (strlen(post('password')) < 8) { // quá ngắn
                $flag = false;
                $content .= 'Mật khẩu quá ngắn.<br>';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                $model->_update(
                    [
                        'firstname' => post('firstname'), 'lastname' => post('lastname'), 'gender' => post('lastname'), 'gender' => post('gender'),
                        'address' => post('address'), 'email' => post('email'), 'phone' => post('phone'),
                        'status' => post('status'), 'note' => post('note'),
                        'image' => $image, 'password' => post('password')
                    ],
                    ['id' => $_GET['id']]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
        }
        $this->render('customer/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
    // xóa tài khoản khách hàng
    function delete()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new customer();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $msg = msg('Xóa không thành công');
        if ($model->delete($_GET['id'])) {
            $list = $model->_list([], $limit, $offset);
            $msg = msg('Xóa thành công', 'success');
        }
        $this->render('customer/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
}
