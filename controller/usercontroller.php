<?php
class usercontroller extends controller
{
    function index()
    {
        if (!checkgroupshow('Manager')) exit;
        $model = new user();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('user', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $this->render('user/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm tài khoản quản trị 
    function searchpost()
    {
        if (!checkgroupshow('Manager')) exit;
        $model = new user();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('user/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    //  tài khoản quản trị 
    function create()
    {
        if (!checkgroupshow('Manager')) exit;
        $this->render('user/create.php', ['list' => (new group())->_list()]);
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new user();
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
            // kiểm tra vị trí
            if (strlen(post('position')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập vị trí.<br>';
            }
            // kiểm tra vị trí
            if (strlen(post('division')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập bộ phận.<br>';
            }
            // kiểm tra tên đăng nhập
            if (unique_value($list, 'username', post('username'))) { //  tên đăng nhập tồn tại hay chưa
                $flag = false;
                $content .= 'Tên đăng nhập đã tồn tại.<br>';
            }
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", post('username'))) { //  tên đăng nhập không bao gồm ký tự đặc biệt
                $flag = false;
                $content .= 'Tên đăng nhập không chứa ký tự đặc biệt.<br>';
            }
            if (strlen(post('username')) > 100) { // độ dài tên đăng nhập không quá 100 ký tự
                $flag = false;
                $content .= 'Tên đăng nhập quá dài.<br>';
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
                        'username' => post('username'), 'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'position' => post('position'), 'division' => post('division'), 'email' => post('email'),
                        'phone' => post('phone'), 'address' => post('address'), 'status' => post('status'), 'password' => post('password'), 'image' => $image, 'group_id' => post('group')
                    ]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('user/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // cập nhật tài khoản quản trị 
    function edit()
    {
        if (!checkgroupshow('Manager')) exit;
        $model = new user();
        $item = $model->_item($_GET['id']);
        $this->render('user/update.php', ['item' => $item, 'list' => (new group())->_list(['status' => 1])]);
    }
    function update()
    {
        //action post 
        $model = new user();
        $item = $model->_item($_GET['id']);
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
            // kiểm tra vị trí
            if (strlen(post('position')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập vị trí.<br>';
            }
            // kiểm tra vị trí
            if (strlen(post('division')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập bộ phận.<br>';
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
            // kiểm tra group
            if (!is_numeric(post('group'))) {
                $flag = false;
                $content .= 'Chưa chọn group.<br>';
            }
            if ($flag) {
                if($item->password == $_POST['password']) {
                    $psw = $_POST['password'];
                } else {
                    $psw = post('password');
                }
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                if ($image) {
                    $model->_update(
                        [
                            'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'position' => post('position'), 'division' => post('division'), 'email' => post('email'),
                            'phone' => post('phone'), 'address' => post('address'), 'status' => post('status'), 'password' => $psw, 'group_id' => post('group'),
                            'image' => $image,
                        ],
                        ['id' => $_GET['id']]
                    );
                } else {
                    $model->_update(
                        [
                            'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'position' => post('position'), 'division' => post('division'), 'email' => post('email'),
                            'phone' => post('phone'), 'address' => post('address'), 'status' => post('status'), 'password' => $psw, 'group_id' => post('group')
                        ],
                        ['id' => $_GET['id']]
                    );
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('user/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // xóa tài khoản quản trị 
    function delete()
    {
        if (!checkgroupshow('Manager')) exit;

        $model = new user();
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
        $this->render('user/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
    // tự chỉnh sửa tài khoản của người dùng đang dăng nhập
    function editprofile()
    {
        $model = new user();
        $item = $model->_item($_GET['id']);
        $this->render('user/updateprofile.php', ['item' => $item]);
    }
    function updateprofile()
    {
        //action post 
        $model = new user();
        $item = $model->_item($_GET['id']);

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
            // kiểm tra mật khẩu
            if (strlen(post('password')) < 8) { // quá ngắn
                $flag = false;
                $content .= 'Mật khẩu quá ngắn.<br>';
            }
            if ($flag) {
                if($item->password == $_POST['password']) {
                    $psw = $_POST['password'];
                } else {
                    $psw = post('password');
                }
                $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
                if ($image) {
                    $model->_update(
                        [
                            'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'position' => post('position'), 'division' => post('division'), 'email' => post('email'),
                            'phone' => post('phone'), 'address' => post('address'), 'password' => $psw,
                            'image' => $image,
                        ],
                        ['id' => $_GET['id']]
                    );
                } else {
                    $model->_update(
                        [
                            'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'position' => post('position'), 'division' => post('division'), 'email' => post('email'),
                            'phone' => post('phone'), 'address' => post('address'), 'password' => $psw,
                        ],
                        ['id' => $_GET['id']]
                    );
                }
                redirect(href('system','index'));
            } else {
                echo $content;
                exit;
            }
        }
    }
    // đăng ký tài khoản quản trị 
    function register()
    {
        $model = new user();
        $list = $model->_list();
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
            // kiểm tra vị trí
            if (strlen(post('position')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập vị trí.<br>';
            }
            // kiểm tra vị trí
            if (strlen(post('division')) < 1) {
                $flag = false;
                $content .= 'Chưa nhập bộ phận.<br>';
            }
            // kiểm tra tên đăng nhập
            if (unique_value($list, 'username', post('username'))) { //  tên đăng nhập tồn tại hay chưa
                $flag = false;
                $content .= 'Tên đăng nhập đã tồn tại.<br>';
            }
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", post('username'))) { //  tên đăng nhập không bao gồm ký tự đặc biệt
                $flag = false;
                $content .= 'Tên đăng nhập không chứa ký tự đặc biệt.<br>';
            }
            if (strlen(post('username')) > 100) { // độ dài tên đăng nhập không quá 100 ký tự
                $flag = false;
                $content .= 'Tên đăng nhập quá dài.<br>';
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
            // kiểm tra mật khẩu
            if (strlen(post('password')) < 8) { // quá ngắn
                $flag = false;
                $content .= 'Mật khẩu quá ngắn.<br>';
            }
            if ($flag) {
                $model->insert(
                    [
                        'username' => post('username'), 'firstname' => post('firstname'), 'lastname' => post('lastname'), 'dob' => post('dob'), 'gender' => post('gender'), 'email' => post('email'),
                        'phone' => post('phone'), 'address' => post('address'), 'password' => post('password'), 'group_id' => (new group())->groupname('Visitor')->id
                    ]
                );
                echo '<script>alert("Đăng ký thành công")</script>';
                redirect(href('user','login'));
            } else {
                $msg = msg($content);
            }
            $this->render('user/register.php', ['msg' => $msg], 'empty');
        }
    }
    function forgot_psw()
    {
        echo 'Chưa có chức năng này';
    }
    // đăng nhập tài khoản quản trị 
    function login()
    {
        $this->render('user/login.php', ['msg' => geterror('msg')], 'empty');
    }
    function loginpost()
    {
        //xu ly luon cung dc
        $msg = '';
        if (post('username') && post('password')) {
            $db = new user();
            $user = $db->login(post('username'), post('password'));
            $db->disconnect();
            if ($user) {
                if ($user->status == 1) {
                    $_SESSION['login_status'] = true;
                    $_SESSION['login_avt'] = $user->image;
                    $_SESSION['login_id'] = $user->id;
                    $_SESSION['login_name'] = $user->firstname . ' ' . $user->lastname;
                    $_SESSION['group_name'] = ((new group())->_item($user->group_id))->name;
                    redirect(BASE);
                } else {
                    seterror(['msg' => msg('Tài khoản bị khóa')]);
                    redirect(href('user', 'login'));
                }
            } else {
                seterror(['msg' => msg('Thông tin đăng nhập không đúng')]);
                redirect(href('user', 'login'));
            }
        }
    }
    // đăng xuất tài khoản quản trị 
    function logout()
    {
        session_destroy();
        redirect(href('user', 'login'));
    }
}
