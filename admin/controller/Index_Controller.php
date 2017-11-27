<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Index_Controller extends Base_Controller
{
  public function indexAction() {
    if ( ! $this->isLogined()) {
      $this->view->load('login');
      return;
    }
    // Load view
    $menu = $this->load_menu($this->rootRoute, $name, $view);
    $this->load_header([
      'title' => $name,
      'breadcrumb' => $this->load_breadcrumb($this->rootRoute),
      'menu' => $menu
    ]);
    $this->view->load($view);
    $this->load_footer();  
  }
}
