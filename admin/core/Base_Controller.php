<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Base_Controller extends LShare_Controller
{
  protected $rootRoute = '/admin/';

  public function __construct() {
      parent::__construct();
      $this->helper->load('check');
      $this->model->load('login');
      $this->model->load('menu');
  }
    
  public function load_header($data) {
      // Load nội dung header
      $this->view->load('header', $data);
  }

  public function load_footer() {
    $this->view->load('footer');
  }

  protected function load_breadcrumb($route) {
    $menu = $this->model->menu->getAll();
    $res = [];
    $check = [];
    foreach ($menu as $key => $value) {
      if ($_SESSION['permission'] < $value['permission']) continue;
      if ($value['route'] == $route) {
        $res[] = $value;
        return $res;
      } else if (strpos($route, $value['route']) > -1 && !ValCheck($check, $value['parent'], 1)) {
        $res[] = $value;
        $check[$value['parent']] = 1; //đánh dấu đã chọn mức này rồi
      }
      if ($value['has-child'] == 1) {
        foreach ($value['childs'] as $k => &$v) {
          if ($v['route'] == $route) {
            $res[] = $value;
            $res[] = $v;
            return $res;
          }
        }
      }
    }

    if (count($res) == 0) { //không có quyền ở route đã chọn => chuyển đến route đầu tiên có quyền
      foreach ($menu as $key => &$value) {
        if ($_SESSION['permission'] >= $value['permission']) {
          if ($value['has-child'] == 1) {         
            $res[] = $value;
            $res[] = $value['childs'][0];
          } else {
            $res[] = $value;
          }
          break;
        }
      }
    }
    return $res;
  }

  protected function load_menu($route, &$name, &$view) {
    $menu = $this->model->menu->getAll();
    $view = "";
    foreach ($menu as $key => &$value) {
      if ($_SESSION['permission'] < $value['permission']) continue;
      
      if ($route === $value['route']) { //tìm thấy route
        $value['active'] = 'active';
        $name = $value['name'];
        $view = $value['view'];
        return $menu;
      }

      if ($value['has-child'] == 1) { //có menu con
        foreach ($value['childs'] as $k => &$v) {
          if ($v['route'] === $route) { //tìm thấy ở menu con
            $value['active'] = $v['active'] = 'active'; //cả cha và con active
            $name = $v['name']; //lấy tên
            $view = $v['view']; //láy file view
            return $menu;
          }
        }
      }
    }

    if ($view == "") { //không có quyền tại route hiện tại => chuyến đến route đầu tiên có quyền
      foreach ($menu as $key => &$value) {
        if ($_SESSION['permission'] >= $value['permission']) {
          if ($value['has-child'] == 1) { //có con thì chọn con đầu tiên
            $value['active'] = $value['childs'][0]['active'] = 'active';
            $name = $value['childs'][0]['name'];
            $view = $value['childs'][0]['view'];
          } else {
            $value['active'] = 'active';
            $name = $value['name'];
            $view = $value['view'];
          }
          break;
        }
      }
    }

    return $menu;
  }
    
  // Hàm hủy này có nhiệm vụ show nội dung của view, lúc này các controller
  // không cần gọi đến $this->view->show nữa
  public function __destruct() 
  {
    $this->view->show();
  }

  protected function isLogined() {
    return isset($_SESSION['user']);
  }
}
