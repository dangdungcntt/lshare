<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Login_Controller extends Base_Controller
{

  public function indexAction()
  {
    if ($this->isLogined()) { header("Location: {$this->rootRoute}"); }
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
      $this->view->load('login');
      return;
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';
      $info = $this->model->login->checkAccount($username, $password);
      if (count($info) > 0) { //success
        $_SESSION['permission'] = $info[0]['permission'];
        $_SESSION['user']['full_name'] = $info[0]['full_name'];
        $_SESSION['user']['name'] = $info[0]['name'];
        $_SESSION['user']['fb_id'] = $info[0]['fb_id'];      
      }
      header("Location: {$this->rootRoute}");
    }
    die("Not support method");
  }
}
