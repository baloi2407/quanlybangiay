<?php
class groupcontroller extends controller
{
    function index()
    {
        if (!checkgroupshow('Manager')) exit;
        $model = new group();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('group', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $this->render('group/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm nhóm quyền
    function searchpost()
    {
        $model = new group();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('group/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // tạo nhóm quyền
    function create()
    {
        if (!checkgroupshow('Manager')) exit;
        $this->render('group/create.php');
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new group();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên nhóm
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên nhóm.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }

            if ($flag) {
                $model->insert(
                    [
                        'name' => post('name'), 'summary' => post('summary'),
                        'status' => post('status'),
                    ]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content, 'danger');
            }
            $this->render('group/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // cập nhật nhóm quyền
    function edit()
    {
        if (!checkgroupshow('Manager')) exit;
        $model = new group();
        $item = $model->_item($_GET['id']);
        $this->render('group/update.php', ['item' => $item]);
    }
    function update()
    {
        //action post 
        $model = new group();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên nhóm quyền
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên nhóm quyền.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }

            if ($flag) {
                $model->_update(
                    [
                        'name' => post('name'), 'status' => post('status'), 'summary' => post('summary')
                    ],
                    ['id' => $_GET['id']]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('group/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // xóa nhóm quyền
    function delete()
    {
        if (!checkgroupshow('Manager')) exit;

        $model = new group();
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
        $this->render('group/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
}
