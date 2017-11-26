<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Login_Controller extends Base_Controller
{

  public function indexAction()
  {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $info = $this->model->login->checkAccount($username, $password);
    if (count($info) > 0) { //success
      $_SESSION['permission'] = $info[0]['permission'];
      $_SESSION['user']['name'] = $info[0]['name'];
      $_SESSION['user']['fb_id'] = $info[0]['fb_id'];      
    }
    header('Location: /admin/');
  }
}
