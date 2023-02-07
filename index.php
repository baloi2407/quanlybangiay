<?php
include 'system/autoload.php';
$controllername = ($_GET['controller'] ?? 'system') . 'controller';
$action = $_GET['action'] ?? 'index';
$path = 'controller/' . $controllername . '.php';
if (file_exists($path)) {
    $controller = new $controllername();
    if (method_exists($controller, $action)) {
        //check login
        if (is_login() || in_array($action, ACCESS)) {
            $controller->$action();
        } else {
            (new usercontroller())->login();
        }
    } else {
        $controller = new systemcontroller();
        $controller->_404();
    }
} else {
    $controller = new systemcontroller();
    $controller->_404();
}
ob_end_flush(); 