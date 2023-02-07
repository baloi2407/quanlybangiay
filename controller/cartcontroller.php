<?php
class cartcontroller extends controller
{
    // hiển thị danh sách các loại sản phẩm: sản phẩm - size
    function index()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        $model = new pro_element();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('cart', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listpro_ele($limit, $offset);

        $list_result = $model->_listpro_ele();
        total_page($limit, $list_result, $total_page);
        $this->render('cart/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm sản phẩm
    function searchpost()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        $model = new pro_element();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch_pro_ele($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch_pro_ele($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('cart/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // thêm vào giỏ hàng
    function addtocart()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        //ma, ten,gia,size,solmua, slkho,hinh
        $model = new pro_element();
        if (isset($_POST['addcart'])) {
            $item = $model->_itempro_ele(post('id'), post('size'));
            $list = $_SESSION['cart'];
            $msg = 'Thêm vào giỏ hàng thành công';
            $type = 'success';
            if (isset($list[$item->element_id])) {
                $list[$item->element_id]['buyqty']++;
                
            } else {
                $list[$item->element_id] = [
                    'id' => $item->element_id,
                    'sku' => $item->sku,
                    'name' => $item->name,
                    'image' => $item->image,
                    'quantity' => $item->quantity,
                    'buyqty' => 1,
                    'price' => $item->price,
                    'size' => $item->size
                ];
            }
        }
        // giohang la tạm , dua tạm vào session để dùng
        $_SESSION['cart'] = $list;
        $this->cart($msg, $type);
    }
    // giỏ hàng
    function cart($msg='', $type='')
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        $list = $_SESSION['cart'];
        if (!is_array($list)) redirect(href('order', 'index'));
        $this->render('cart/cart.php', ['list' =>  $list, 'msg' => msg($msg, $type)]);
    }
    // cập nhật giỏ hàng
    function updatecart()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        if (isset($_POST['updatecart'])) {
            $list = $_SESSION['cart'];
            foreach ($_POST['qty'] as $id => $qty) {
                if (isset($list[$id])) {
                    if ($qty > 0 && $qty <= $list[$id]['quantity']) {
                        $list[$id]['buyqty'] = $qty;
                        $msg = msg('Cập nhật thành công', 'success');
                    } else {
                        $msg = msg('Hết hàng');
                    }
                }
            }
        }
        $_SESSION['cart'] = $list;
        $this->render('cart/cart.php', ['list' => $_SESSION['cart'], 'msg' => $msg]);
    }
    // xóa sản phẩm khỏi giỏ hàng
    function deletecart()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        $list = $_SESSION['cart'];
        $name = '';
        if (isset($list[$_GET['id']])) {
            $name = $list[$_GET['id']]['name'];
            unset($list[$_GET['id']]);
        }
        // giohang la tạm , dua tạm vào session để dùng
        $_SESSION['cart'] = $list;
        $this->render('cart/cart.php', ['list' => $_SESSION['cart'], 'msg' => msg('Đã xóa ' . $name, 'success')]);
    }
    // hiển thị danh sách sản phẩm muốn thanh toán
    function checkout()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;

        $this->render('cart/checkout.php', ['list' => $_SESSION['cart']]);
    }
    // thanh toán
    function checkoutpost()
    {
        if (!checkgroupshow('Manager') || !checkgroupshow('Creator')) exit;
        
        $model = new order();
        $model_detail = new order_detail();
        if (isset($_POST['checkout'])) {
            $flag = true;
            $customer_id = ((new customer)->_itemcustomer(['username' => post('username')]));
            $content = $msg = '';
            // kiểm tra phải có khách phải có tài khoản thì mới dc đặt hàng
            if (!$customer_id) {
                $flag = false;
                $content = 'Tài khoản không tồn tại.<br>';
            }
            // kiểm tra trạng thái đơn hàng
            if(!is_numeric(post('order_status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái đơn hàng.<br>';
            }
            // kiểm tra trạng thái
            if(!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            if ($flag) {
                $code = time();
                $model->insert(
                    [
                        'code' => $code, 'customer_id' => $customer_id->id, 'total_amount' => post('total'),
                        'status' => post('status'), 'order_status' => post('order_status'), 'notes' => post('note')
                    ]
                );
                //tao detail
                $order_id = $model->last_id();
                $list = $_SESSION['cart'];
                foreach ($list as $item) {
                    $model_detail->insert(
                        [
                            'order_id' => $order_id->last_id, 'product_id' => $item['id'], 'qty' => $item['buyqty'], 'price' => $item['price'], 'size' => $item['size']
                        ]
                    );
                }
                unset($_SESSION['cart']);
                $this->cart('Thêm đơn hàng thành công: mã đơn ' . $code,'success');
            } else {
                $this->cart($content,'danger');
            }
        }
    }
}
