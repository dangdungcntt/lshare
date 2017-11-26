<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class File_Controller extends Base_Controller
{
  public function indexAction() {
    if ( ! $this->isLogined()) { header("Location: /admin/"); return; }
    $route = '/admin/file/';
    $menu = $this->load_menu($route);
    $this->load_header([
      'title' => 'Quản lý tệp', 
      'name' => $_SESSION['user']['name'],
      'breadcrumb' => $this->load_breadcrumb($route, 1),
      'menu' => $menu
    ]);
    $this->view->load('list-file');
  }

  public function uploadAction() {
    if ( ! $this->isLogined()) { header("Location: /admin/"); return; }
    $route = '/admin/file/upload/';
    $menu = $this->load_menu($route);
    $this->load_header([
      'title' => 'Thêm tệp tin',
      'name' => $_SESSION['user']['name'],
      'breadcrumb' => $this->load_breadcrumb($route, 2),
      'menu' => $menu
    ]);
    $this->view->load('upload-file');
  }

  public function __destruct() {
    $this->load_footer();
    parent::__destruct();
  }
}
