<?php
class systemcontroller extends controller
{
    function index()
    {
        $item = (new user)->_item($_SESSION['login_id']);
        $this->render('view/trangchu.php', ['item' => $item]);
    }
    function contact()
    {
        include 'view/lienhe.php';
    }
    function _404()
    {
        include 'view/404.php';
    }
}
