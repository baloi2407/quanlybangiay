<?php
class statisticcontroller extends controller
{
    // hiển thị danh sách các loại sản phẩm: sản phẩm - size
    function index()
    {
        if (isset($_POST['save'])) {
            $from = post('from');
            $to = post('to');
            redirect(href('statistic', 'search', ['from' => $from, 'to' => $to]));
        }
        $this->render('statistic/create.php');
    }
    function search()
    {
        $model = new order_detail();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listcount($_GET['from'], $_GET['to'], $limit, $offset);

        $list_result = $model->_listcount($_GET['from'], $_GET['to']);
        total_page($limit, $list_result, $total_page);
        $this->render('statistic/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
}
