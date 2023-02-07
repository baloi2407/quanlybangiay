<?php
class newscontroller extends controller
{
    // Danh sách bài viết
    function index()
    {
        $model = new news();
        if (isset($_POST['search'])) {
            $kw = post('keyword');
            redirect(href('news', 'searchpost', ['keyword' => $kw]));
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('news/list.php', ['list' => $list, 'total_page' => $total_page]);
    }
    // Tìm kiếm bài viết
    function searchpost()
    {
        $model = new news();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_listsearch($_GET['keyword'], [], $limit, $offset);
        if (!count($list)) $msg = msg('Không tìm thấy');

        $list_result = $model->_listsearch($_GET['keyword'], []);
        total_page($limit, $list_result, $total_page);
        $this->render('news/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
    }
    // Thêm bài viết
    function create()
    {
        checkgroup2($_SESSION['group_name']);

        $model_newscate = new news_category();
        $list_newscate = $model_newscate->_list();
        $this->render('news/create.php', ['list_newscate' => $list_newscate]);
    }
    function store()
    {
        // xử lý dữ liệu thêm vào
        $model = new news();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $model_news_image = new news_image();
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên bài viết
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên bài viết.<br>';
            }
            // kiểm tra nôi dung
            if (strlen(post('content')) < 50) {
                $flag = false;
                $content .= 'Chưa nhập nội dung.<br>';
            }
            // kiểm tra danh mục
            if (!is_numeric(post('category_id'))) {
                $flag = false;
                $content .= 'Chưa chọn danh mục.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chưa chọn trạng thái.<br>';
            }
            // kiểm tra hình ảnh liên quan tối đa 4 hình
            if (count($_FILES['images']['name']) > 4) {
                $flag = false;
                $content .= 'Tối đa 4 hình ảnh liên quan';
            }

            if ($flag) {
                $image = myupload($_FILES['image'], 'public/uploads/news_images/', $er);
                $image_share = myupload($_FILES['image_share'], 'public/uploads/news_images/', $er);
                $model->insert(
                    [
                        'name' => post('name'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                        'image' => $image, 'content' => post('content'), 'alias' => post('alias'),
                        'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share,
                    ]
                );
                $news_id = $model->last_id();
                // thêm hình ảnh liên quan cho bài viết
                if (isset($_FILES['images']['name']) && $_FILES['images']['name']) {
                    $images = myuploads($_FILES['images'], 'public/uploads/news_images/');
                    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                        $model_news_image->insert(
                            [
                                'news_id' => $news_id->last_id, 'image' => $images[$i]['path']
                            ]
                        );
                    }
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Thêm thành công', 'success');
            } else {
                $msg = msg($content, 'danger');
            }
            $this->render('news/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
        }
    }
    // Cập nhật bài viết
    function edit()
    {
        checkgroup2($_SESSION['group_name']);

        $model = new news();
        $item = $model->_item($_GET['id']);
        $model2 = new news_category();
        $list_cat = $model2->_list();
        $model4 = new news_image();
        $list_image = $model4->list_image($_GET['id']);
        $this->render('news/update.php', ['item' => $item, 'list_cat' => $list_cat, 'list_image' => $list_image]);
    }
    function update()
    {
        //action post 
        $model = new news();
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $model_news_image = new pro_image();
        $content = $msg = '';
        if (isset($_POST['save'])) {
            $flag = true;

            // kiểm tra tên bài viết
            if (strlen(post('name')) < 1) {
                $flag = false;
                $content = 'Chưa nhập tên bài viết.<br>';
            }
            // kiểm tra nôi dung
            if (strlen(post('content')) < 50) {
                $flag = false;
                $content .= 'Chưa nhập nội dung.<br>';
            }
            // kiểm tra danh mục
            if (!is_numeric(post('category_id'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng danh mục.<br>';
            }
            // kiểm tra trạng thái
            if (!is_numeric(post('status'))) {
                $flag = false;
                $content .= 'Chọn sai định dạng trạng thái.<br>';
            }
            // kiểm tra hình ảnh liên quan tối đa 4 hình
            if (count($_FILES['images']['name']) > 5) {
                $flag = false;
                $content .= 'Tối đa 4 hình ảnh liên quan';
            }


            if ($flag) {
                // kiểm tra hình ảnh 
                if (isset($_FILES['image']['name']) && $_FILES['image']['name']) {
                    $image = myupload($_FILES['image'], 'public/uploads/news_images/', $er);
                    // thêm hình ảnh liên quan cho bài viết
                    if (isset($_FILES['images']['name']) && $_FILES['images']['name']) {
                        $images = myuploads($_FILES['images'], 'public/uploads/news_images/');
                        for ($i = 0; $i < count($images); $i++) {
                            $model_news_image->insert(
                                [
                                    'news_id' => $_GET['id'], 'image' => $images[$i]['path']
                                ]
                            );
                        }
                    }
                    if (isset($_FILES['image_share']['name']) && $_FILES['image_share']['name']) {
                        // kiểm tra hình ảnh seo
                        $image_share = myupload($_FILES['image_share'], 'public/uploads/news_images/', $er);
                        // tiến hành update
                        $model->_update(
                            [
                                'name' => post('name'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'image' => $image, 'promo' => post('promo'), 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                            ],
                            ['id' => $_GET['id']]
                        );
                    } else {
                        $model->_update(
                            [
                                'name' => post('name'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'image' => $image, 'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status')
                            ],
                            ['id' => $_GET['id']]
                        );
                    }
                } else {
                    if (isset($_FILES['image_share']['name']) && $_FILES['image_share']['name']) {
                        // kiểm tra hình ảnh seo
                        $image_share = myupload($_FILES['image_share'], 'public/uploads/news_images/', $er);
                        // tiến hành update
                        $model->_update(
                            [
                                'name' => post('name'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status'), 'image_share' => $image_share
                            ],
                            ['id' => $_GET['id']]
                        );
                    } else {
                        $model->_update(
                            [
                                'name' => post('name'), 'summary' => post('summary'), 'description' => post('description'), 'category_id' => post('category_id'),
                                'content' => post('content'), 'alias' => post('alias'),
                                'keyword' => post('keyword'), 'title' => post('title'), 'status' => post('status')
                            ],
                            ['id' => $_GET['id']]
                        );
                    }
                }
                $list = $model->_list([], $limit, $offset);
                $msg = msg('Cập nhật thành công', 'success');
            } else {
                $msg = msg($content);
            }
        }

        $this->render('news/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }

    // Xóa bài viết
    function delete()
    {
        checkgroup2($_SESSION['group_name']);

        $msg = '';
        $model = new news();
        if ($model->delete($_GET['id'])) {
            $msg = msg('Xóa thành công', 'success');
            $model = new news();
        } else {
            $msg = msg('Xóa không thành công', 'danger');
        }
        $limit = 10;
        limit_offset($limit, $offset, $_GET['page'] ?? 1);

        $list = $model->_list([], $limit, $offset);

        $list_result = $model->_list();
        total_page($limit, $list_result, $total_page);

        $this->render('news/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg]);
    }
}
