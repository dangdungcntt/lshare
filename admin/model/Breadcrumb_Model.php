<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Breadcrumb_Model extends LShare_Model
{
  public function getAll()
  {
    return $this->query("SELECT * FROM `breadcrumb` ORDER BY `level` ASC");
  }
}
