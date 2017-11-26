<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**
 * @package     LShare_Framework
 * @author      Freetuts Dev Team
 * @email       freetuts.net@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/loader/LShare_Library_Loader.php
 */
class LShare_Model_Loader
{
  /**
   * Load library
   * 
   * @param   string
   * @param   array
   * @desc    hàm load library, tham số truyền vào là tên của library và 
   *          danh sách các biến trong hàm khởi tạo (nếu có)
   */
  public function load($model, $agrs = array())
  {
    // Nếu thư viện chưa được load thì thực hiện load
    if ( empty($this->{$model}) )
    {
      // Chuyển chữ hoa đầu và thêm hậu tố _Library
      $class = ucfirst($model) . '_Model';
      require_once(PATH_APPLICATION . '/model/' . $class . '.php');
      $this->{$model} = new $class($agrs);
    }
  }
}
