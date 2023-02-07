<?php
class newscategorycontroller extends controller
{
  function index()
  {
    $model = new news_category();
    if (isset($_POST['search'])) {
      $kw = post('keyword');
      redirect(href('newscategory', 'searchpost', ['keyword' => $kw]));
    }
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => 0], $limit, $offset);

    $list_result = $model->_list(['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);
    $this->render('news_category/list.php', ['list' => $list, 'total_page' => $total_page]);
  }
  // Tìm kiếm danh mục tin
  function searchpost()
  {
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_listsearch($_GET['keyword'], ['parent_id' => 0], $limit, $offset);
    if (!count($list)) $msg = msg('Không tìm thấy');

    $list_result = $model->_listsearch($_GET['keyword'], ['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);
    $this->render('news_category/list.php', ['list' => $list, 'total_page' => $total_page, 'msg' => $msg ?? '']);
  }
  // tạo danh mục
  function create()
  {
    checkgroup2($_SESSION['group_name']);

    $this->render('news_category/create.php');
  }
  function store()
  {
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => 0], $limit, $offset);

    $list_result = $model->_list(['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);
    $content = $msg = '';
    if (isset($_POST['save'])) {
      $flag = true;
      // kiểm tra tên danh mục
      if (strlen(post('name')) < 1) {
        $flag = false;
        $content = 'Chưa nhập tên.';
      }
      // kiểm tra trạng thái
      if (!is_numeric(post('status'))) {
        $flag = false;
        $content .= 'Chưa chọn trạng thái.';
      }
      if ($flag) {
        $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
        $model->insert(
          [
            'name' => post('name'), 'summary' => post('summary'), 'image' => $image, 'status' => post('status'), 'alias' => post('alias'),
            'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'),
          ]
        );
        $list = $model->_list(['parent_id' => 0], $limit, $offset);
        $msg = msg('Thêm thành công', 'success');
      } else {
        $msg = msg($content);
      }
      $this->render('news_category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }
  // cập nhật danh mục 
  function edit()
  {
    checkgroup2($_SESSION['group_name']);

    $model = new news_category();
    $item = $model->_item($_GET['id']);
    $this->render('news_category/update.php', ['item' => $item]);
  }
  function update()
  {
    //action post 
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => 0], $limit, $offset);

    $list_result = $model->_list(['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);
    $content = $msg = '';
    if (isset($_POST['save'])) {
      $flag = true;
      // kiểm tra tên danh mục
      if (strlen(post('name')) < 1) {
        $flag = false;
        $content = 'Chưa nhập tên.';
      }
      // kiểm tra trạng thái
      if (!is_numeric(post('status'))) {
        $flag = false;
        $content .= 'Chưa chọn trạng thái.';
      }
      if ($flag) {
        $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
        if ($image) {
          $model->_update(
            [
              'name' => post('name'), 'summary' => post('summary'), 'status' => post('status'), 'alias' => post('alias'),
              'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'), 'image' => $image
            ],
            ['id' => $_GET['id']]
          );
        } else {
          $model->_update(
            [
              'name' => post('name'), 'summary' => post('summary'), 'status' => post('status'), 'alias' => post('alias'),
              'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'),
            ],
            ['id' => $_GET['id']]
          );
        }
        $list = $model->_list(['parent_id' => 0], $limit, $offset);
        $msg = msg('Thêm thành công', 'success');
      } else {
        $msg = msg($content);
      }
    }
    $this->render('news_category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
  }
  // danh sách danh mục con
  function index_child()
  {
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);

    $list_result = $model->_list(['parent_id' => $_GET['id']]);
    total_page($limit, $list_result, $total_page);
    $this->render('news_category/listchild.php', ['list' => $list, 'total_page' => $total_page]);
  }
  // tạo danh mục con
  function create_child()
  {
    checkgroup2($_SESSION['group_name']);

    $this->render('news_category/createchild.php');
  }
  function store_child()
  {
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);

    $list_result = $model->_list(['parent_id' => $_GET['id']]);
    total_page($limit, $list_result, $total_page);
    $content = $msg = '';
    if (isset($_POST['save'])) {
      $flag = true;
      // kiểm tra tên danh mục
      if (strlen(post('name')) < 1) {
        $flag = false;
        $content = 'Chưa nhập tên.';
      }
      // kiểm tra trạng thái
      if (!is_numeric(post('status'))) {
        $flag = false;
        $content .= 'Chưa chọn trạng thái.';
      }
      if ($flag) {
        $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
        $model->insert(
          [
            'name' => post('name'), 'summary' => post('summary'), 'image' => $image, 'parent_id' => $_GET['id'], 'status' => post('status'), 'alias' => post('alias'),
            'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'),
          ]
        );
        $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);
        $msg = msg('Thêm danh mục con thành công', 'success');
      } else {
        $msg = msg($content);
      }
      $this->render('news_category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }

  function edit_child()
  {
    checkgroup2($_SESSION['group_name']);

    $model = new news_category();
    $item = $model->_item($_GET['id']);
    $this->render('news_category/updatechild.php', ['item' => $item]);
  }

  function update_child()
  {
    //action post 
    $model = new news_category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);

    $list_result = $model->_list(['parent_id' => $_GET['id']]);
    total_page($limit, $list_result, $total_page);
    $content = $msg = '';
    if (isset($_POST['save'])) {
      $flag = true;
      // kiểm tra tên danh mục
      if (strlen(post('name')) < 1) {
        $flag = false;
        $content = 'Chưa nhập tên.';
      }
      // kiểm tra trạng thái
      if (!is_numeric(post('status'))) {
        $flag = false;
        $content .= 'Chưa chọn trạng thái.';
      }
      if ($flag) {
        $image = myupload($_FILES['image'], 'public/uploads/images/', $er);
        if ($image) {
          $model->_update(
            [
              'name' => post('name'), 'summary' => post('summary'), 'status' => post('status'), 'alias' => post('alias'),
              'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'), 'image' => $image
            ],
            ['id' => $_GET['id']]
          );
        } else {
          $model->_update(
            [
              'name' => post('name'), 'summary' => post('summary'), 'status' => post('status'), 'alias' => post('alias'),
              'keyword' => post('keyword'), 'description' => post('description'), 'title' => post('title'),
            ],
            ['id' => $_GET['id']]
          );
        }
        $list = $model->_list(['parent_id' => $_GET['pid']], $limit, $offset);
        $msg = msg('Cập nhật thành công', 'success');
      } else {
        $msg = msg($content);
      }
    }
    $this->render('news_category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
  }
  function delete()
  {
    checkgroup2($_SESSION['group_name']);

    $model = new news_category();
    $model->delete($_GET['id']);
    $msg = msg('Cập nhật thành công', 'success');
    // xóa danh mục con
    if (isset($_GET['pid']) && $_GET['pid']) {
      $limit = 10;
      limit_offset($limit, $offset, $_GET['page'] ?? 1);

      $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);

      $list_result = $model->_list(['parent_id' => $_GET['pid']]);
      total_page($limit, $list_result, $total_page);
      $this->render('news_category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
    // xóa danh mục cha
    else {
      $list = $model->_list(['parent_id' => 0]);
      $limit = 10;
      limit_offset($limit, $offset, $_GET['page'] ?? 1);

      $list = $model->_list(['parent_id' => 0], $limit, $offset);

      $list_result = $model->_list(['parent_id' => 0]);
      total_page($limit, $list_result, $total_page);
      $this->render('news_category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }
}
