<?php
class orderdetailcontroller extends controller
{
    // hiển thị danh sách các loại sản phẩm: sản phẩm - size
    function index()
    {
        $model = new order_detail();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list(['order_id' => $_GET['id']], $limit, $offset);

        $list_result = $model->_list(['order_id' => $_GET['id']]);
        total_page($limit, $list_result, $total_page);
        $this->render('order_detail/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
}
