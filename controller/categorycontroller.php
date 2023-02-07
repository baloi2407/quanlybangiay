<?php
class categorycontroller extends controller
{
  // danh sách danh mục
  function index()
  {
    $model = new category();
    if (isset($_POST['search'])) {
      $kw = post('keyword');
      redirect(href('category', 'searchpost', ['keyword' => $kw]));
    }
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => 0], $limit, $offset);

    $list_result = $model->_list(['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);

    $this->render('category/list.php', ['list' => $list, 'total_page' => $total_page]);
  }
  // Tìm kiếm danh mục
  function searchpost()
  {
    $model = new category();
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_listsearch($_GET['keyword'], ['parent_id' => 0], $limit, $offset);

    $list_result = $model->_listsearch($_GET['keyword'], ['parent_id' => 0]);
    total_page($limit, $list_result, $total_page);
    $this->render('category/list.php', ['list' => $list, 'total_page' => $total_page]);
  }
  // tạo danh mục
  function create()
  {
        checkgroup2($_SESSION['group_name']);

    $this->render('category/create.php');
  }
  function store()
  {
    $model = new category();
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
      $this->render('category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }
  // cập nhật danh mục 
  function edit()
  {
        checkgroup2($_SESSION['group_name']);

    $model = new category();
    $item = $model->_item($_GET['id']);
    $this->render('category/update.php', ['item' => $item]);
  }
  function update()
  {
    //action post 
    $model = new category();
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
    $this->render('category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
  }

  // danh sách danh mục con
  function index_child()
  {
        checkgroup2($_SESSION['group_name']);

    $model = new category();
    $item_parent = $model->_item($_GET['id']);
    $limit = 10;
    limit_offset($limit, $offset, $_GET['page'] ?? 1);

    $list = $model->_list(['parent_id' => $_GET['id']], $limit, $offset);

    $list_result = $model->_list(['parent_id' => $_GET['id']]);
    total_page($limit, $list_result, $total_page);
    $this->render('category/listchild.php', ['list' => $list, 'total_page' => $total_page, 'item_parent' => $item_parent]);
  }
  // tạo danh mục con
  function create_child()
  {
        checkgroup2($_SESSION['group_name']);

    $this->render('category/createchild.php');
  }
  function store_child()
  {
    $model = new category();
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
      $this->render('category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }

  function edit_child()
  {
        checkgroup2($_SESSION['group_name']);

    $model = new category();
    $item = $model->_item($_GET['id']);
    $this->render('category/updatechild.php', ['item' => $item]);
  }

  function update_child()
  {
    //action post 
    $model = new category();
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
    $this->render('category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
  }
  function delete()
  {
        checkgroup2($_SESSION['group_name']);

    $model = new category();
    $model->delete($_GET['id']);
    $msg = msg('Cập nhật thành công', 'success');
    // xóa danh mục con
    if (isset($_GET['pid']) && $_GET['pid']) {
      $limit = 10;
      limit_offset($limit, $offset, $_GET['page'] ?? 1);

      $list = $model->_list(['parent_id' => $_GET['pid']], $limit, $offset);

      $list_result = $model->_list(['parent_id' => $_GET['pid']]);
      total_page($limit, $list_result, $total_page);
      $this->render('category/listchild.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
    // Xóa danh mục cha
    else {
      $list = $model->_list(['parent_id' => 0]);
      $limit = 10;
      limit_offset($limit, $offset, $_GET['page'] ?? 1);

      $list = $model->_list(['parent_id' => 0], $limit, $offset);

      $list_result = $model->_list(['parent_id' => 0]);
      total_page($limit, $list_result, $total_page);
      $this->render('category/list.php', ['list' => $list, 'msg' => $msg, 'total_page' => $total_page]);
    }
  }
}
