<?php
class ordercontroller extends controller
{
    function index()
    {
        $model = new order();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('order', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $this->render('order/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm đơn hàng
    function searchpost()
    {
        $model = new order();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);

        $list_result = $model->_listsearch($_GET['keyword'], []);
        if (!count($list)) $msg = msg('Không tìm thấy');

        total_page($limit, $list_result, $total_page);
        $this->render('order/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // cập nhật đơn hàng
    function edit()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new order();
        $item = $model->_item($_GET['id']);

        $this->render('order/update.php', ['item' => $item]);
    }
    function update()
    {
        //action post 
        $model = new order();
        $list = $model->_item($_GET['id']);
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;
            // kiểm tra status
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            // kiểm tra status đơn hàng
            if (!is_numeric(post('order_status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái đơn hàng.<br>';
            }
            if ($flag) {
                $model->_update(
                    [
                        'status' => post('status'), 'order_status' => post('order_status'), 'notes' => post('note')
                    ],
                    ['id' => $_GET['id']]
                );
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
            $this->render('order/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
        $this->render('order/update.php', ['list' => $list]);
    }
    // xóa đơn hàng
    function delete()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new order();
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
        $this->render('order/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
}
