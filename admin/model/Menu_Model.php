<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Menu_Model extends LShare_Model
{
  public function getAll() {
    $menuLV0 =  $this->query("SELECT * FROM `menu` WHERE `parent` = 0");

    foreach ($menuLV0 as $key => &$value) {
      if ($value['has-child'] == 1) {
        $value['childs'] = $this->query("SELECT * FROM `menu` WHERE `parent` = {$value['id']}");
      }
    }
    return $menuLV0;
  }
}
