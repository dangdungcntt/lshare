<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Base_Controller extends LShare_Controller
{
  public function __construct() {
      parent::__construct();
      $this->helper->load('check');
      $this->model->load('login');
      $this->model->load('menu');
      $this->model->load('breadcrumb');
  }
    
  public function load_header($data) {
      // Load nội dung footer
      $this->view->load('header', $data);
  }

  public function load_footer() {
    $this->view->load('footer');
  }

  protected function load_breadcrumb($route, $level) {
    $breadcrumb = $this->model->breadcrumb->getAll();
    // debug($breadcrumb);
    $res = [];
    $check = [];
    foreach ($breadcrumb as $key => $value) {
      if ($value['level'] < $level) {
        if (strpos($route, $value['route']) > -1 && !ValCheck($check, $value['level'], 1)) {
          $res[] = $value;
          $check[$value['level']] = 1;
        }
      } else {
        if ($value['route'] === $route) {
          $res[] = $value;
          return $res;
        }
      }
    }
    return null;
  }

  protected function load_menu($route) {
    $menu = $this->model->menu->getAll();

    foreach ($menu as $key => &$value) {
      
      if ($route === $value['route']) {
        $value['active'] = 'active';
        break;
      }
      if ($value['has-child'] == 1) {
            
        foreach ($value['childs'] as $k => &$v) {
          if ($v['route'] === $route) {
            $value['active'] = $v['active'] = 'active';
                
            break;
          }
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
