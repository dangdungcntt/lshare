<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Login_Model extends LShare_Model
{
  public function checkAccount($username, $password)
  {
    $sql = "SELECT `name`, `permission`, `fb_id` FROM `user` WHERE `username` = ? AND `password` = ?";
    return $this->prepareQuery($sql, "ss", [$username, md5($password)]);
  }
}
