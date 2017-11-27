<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Login_Model extends LShare_Model
{
  public function checkAccount($username, $password)
  {
    $sql = "SELECT username, full_name, fb_id, name, `value` as 'permission' 
            FROM `user` JOIN `permission` ON user.permission_id = permission.id
            WHERE `username` = ? AND `password` = ?";
    return $this->prepareQuery($sql, "ss", [$username, md5($password)]);
  }
}
