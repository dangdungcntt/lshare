<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Index_Controller extends Base_Controller
{

  public function indexAction()
  {
    if ( ! $this->isLogined()) {
      $this->view->load('login');
      return;
    }
    // Load view
    $menu = $this->load_menu('/admin/');
    $this->load_header([
      'title' => 'Trang quản trị',
      'name' => $_SESSION['user']['name'],
      'breadcrumb' => $this->load_breadcrumb('/admin/', 0),
      'menu' => $menu
    ]);
    $this->view->load('list-file');
    $this->load_footer();
  }
}
