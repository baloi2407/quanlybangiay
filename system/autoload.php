<?php
ob_start();
session_start();
include 'system/config/config.php';
include 'system/libs/funcs.php';
//xu ly autoload cho toan bo he thong
spl_autoload_register(function ($className) {
    $pathcontroller = 'controller/' . $className . '.php';
    if (file_exists($pathcontroller))
        include $pathcontroller;
    $pathmodel = 'model/' . $className . '.php';
    if (file_exists($pathmodel))
        include $pathmodel;
    $pathdb = 'system/db/' . $className . '.php';
    if (file_exists($pathdb))
        include $pathdb;
    $pathlibs = 'system/libs/' . $className . '.php';
    if (file_exists($pathlibs))
        include $pathlibs;
});