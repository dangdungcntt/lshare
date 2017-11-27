<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class File_Controller extends Base_Controller
{
  public function __construct() {
    parent::__construct();
    $this->route = $this->rootRoute . 'file/';
  }

  public function indexAction() {
    if ( ! $this->isLogined()) { $this->view->load('login'); return; } //chưa đăng nhập

    $menu = $this->load_menu($this->route, $name, $view);
    $breadcrumb = $this->load_breadcrumb($this->route);

    $this->load_header([
      'title' => $name,
      'breadcrumb' => $breadcrumb,
      'menu' => $menu
    ]);
    $this->view->load($view);
    $this->load_footer();
  }

  public function uploadAction() {
    if ( ! $this->isLogined()) { $this->view->load('login'); return; } //chưa đăng nhập

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
      $uploadRoute = $this->route . 'upload/';
      $menu = $this->load_menu($uploadRoute, $name, $view);
      $breadcrumb = $this->load_breadcrumb($uploadRoute);

      $this->load_header([
        'title' => $name,
        'breadcrumb' => $breadcrumb,
        'menu' => $menu
      ]);
      $this->view->load($view);
      $this->load_footer();
      return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

    }
    die("Not support method");
  }
}
