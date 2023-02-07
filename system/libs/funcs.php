<?php

/**
 * Hàm upload viết lại để xu lý file up lên: kiem soat đc các yêu cau sau: tên file luu trư, noi luu , loai file, kich thuoc
 * Ten ham: myupload
 * tham so: file(gồm 5 pt của 1 tâp tin khi upload lên)
 *          folder: nơi lưu 
 *          types: danh sách đuôi file được phép upload => kiểu máng
 *          maxsize: dung lượng tối đa đc phép upload => tự quy định đơn vị => ở đây mình đang quy định so sánh theo MB
 *          name: tên dùng để luu tru tren sv, tự ql riêng  
 */
function myupload($file, $folder, &$msg = '', $types = ['.jpg', '.png', '.gif', '.jpeg', '.ico', '.svg'], $maxsize = 2, $name = 'file_')
{
    /* $file = 
     *Array
        (
            [name] => desktop2.png
            [type] => image/png
            [tmp_name] => C:\wamp64\tmp\phpC7F8.tmp
            [error] => 0
            [size] => 956532
        )
     */
    //kiem tra tinh hop le cua file up len server
    if (isset($file['error'], $file['tmp_name']) && $file['error'] == 0  && $file['tmp_name']) {
        //kiem tra kich thuoc
        $bsize = $maxsize * 1024 * 1024;
        if ($file['size'] > 0 && $file['size'] <= $bsize) {
            //kiem tra loai file
            //lay duoi file
            $ext = strtolower(substr($file['name'], strrpos($file['name'], '.')));
            if (in_array($ext, $types)) {
                //ok het roi chuyen ve file goc
                $file_name = $name . time() . $ext;
                $fullpath = $folder . '/' . $file_name;
                //up
                if (move_uploaded_file($file['tmp_name'], $fullpath)) {
                    return $file_name;
                } else {
                    $msg = 'Upload không thành công';
                    return false;
                }
            } else {
                $msg = 'Chỉ cho phép các định dạng sau: ' . implode(',', $types);
                return false;
            }
        } else {
            $msg = 'Dung lượng tối đa cho phép: ' . $maxsize . 'MB';
            return false;
        }
    } else {
        $msg = 'File không hợp lệ';
        return false;
    }
}
function myuploads($files, $folder, $types = ['.png', '.jpg', '.jpeg', '.gif'], $maxsize = 4, $filename = 'file_')
{
    if (isset($files['name']) && is_array($files['name'])) {
        $kq = [];
        foreach ($files['name'] as $i => $name) {
            $file = [
                'name' => $name,
                'type' => $files['type'][$i],
                'tmp_name' => $files['tmp_name'][$i],
                'error' => $files['error'][$i],
                'size' => $files['size'][$i]
            ];
            $er = '';
            $rs = myupload($file, $folder, $er, $types, $maxsize, $filename . $i . '_');
            $kq[] = ['name' => $name, 'path' => $rs, 'er' => $er];
        }
        return $kq;
    } else {
        return false;
    }
}
function view_array($a)
{
    echo '<pre>', print_r($a), '</pre>';
    exit;
}
function redirect($url, $data = [])
{
    header('location: ' . $url);
    if (is_array($data)) {
        extract($data);
    }
    exit;
}
function checkgroupshow($group_name) {
    if ($_SESSION['group_name'] != $group_name) {
        return false;
    }
    return true;
}
function checkgroup2($name,$group_name=['Manager','Creator']) {
    if(!in_array($name,$group_name)) {
        echo 'Không đủ quyền truy cập';
        exit;
    }
}
function checkgroup($group_name)
{
    if(!checkgroupshow($group_name))
    echo 'Không đủ quyền truy cập';
    exit;
}
function is_login()
{
    return isset($_SESSION['login_status']) &&  $_SESSION['login_status'];
}
function msg($content, $type = 'danger')
{
    return  '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    ' . $content . '
  </div>
  
  <script>
    $(".alert").alert();
  </script>';
}
function href($controller = 'system', $action = 'index', $params = [])
{
    $ex = '';
    foreach ($params as $k => $v) {
        $ex .= "&$k=$v";
    }
    return BASE . '?controller=' . $controller . '&action=' . $action . $ex;
}
function post($name)
{
    if ($name == 'password')
        return trim(md5($_POST[$name]) ?? null);
    else
        return trim($_POST[$name] ?? null);
}


function seterror($values = [])
{
    foreach ($values as $key => $value) {
        $_SESSION['error'][$key] = $value;
    }
}
function geterror($key = '')
{
    $msg = $_SESSION['error'][$key] ?? '';
    unset($_SESSION['error'][$key]);
    return $msg;
}
function getavatar($file, $folder = 'public/uploads/images/')
{
    return $folder . $file;
}

function unique_value($list = [], $column, $value)
{
    foreach ($list as $item) {
        if ($item->{$column} == $value) {
            return true;
        }
    }
    return false;
}

function alert($status, $value, $er_img = '')
{
    return '<div class="alert alert-' . $status . ' alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>' . $value . '</strong>.' . $er_img . ' 
  </div>
  
  <script>
    $(".alert").alert();
  </script>';
}

function limit_offset($limit, &$offset, $page)
{
    $page_number = isset($page) ? $page : 1;
    $page_number = $page_number < 1 ? 1 : $page;
    $offset = ($page_number - 1) * $limit;
}
function total_page($limit, $list_result, &$total_page)
{
    $list_count = count($list_result);
    $total_page = ceil($list_count / $limit);
}
