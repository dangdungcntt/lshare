<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

/**
 * @filesource  system/core/LShare_Controller.php
 */
class LShare_Controller
{
  // Đối tượng view
  protected $view     = NULL;

  // Đối tượng model
  protected $model    = NULL;

  // Đối tượng library
  protected $library  = NULL;

  // Đối tượng helper
  protected $helper   = NULL;

  // Đối tượng config
  protected $config   = NULL;

  /**
   * Hàm khởi tạo
   * 
   * @desc    Load các thư viện cần thiết
   */
  public function __construct() 
  {
    // Loader cho config
    require_once PATH_SYSTEM . '/core/loader/LShare_Config_Loader.php';
    $this->config = new LShare_Config_Loader();
    $this->config->load('config');

    // Loader Library
    require_once PATH_SYSTEM . '/core/loader/LShare_Library_Loader.php';
    $this->library = new LShare_Library_Loader();

    // Load Helper
    require_once PATH_SYSTEM . '/core/loader/LShare_Helper_Loader.php';
    $this->helper = new LShare_Helper_Loader();

    //load Model
    require_once PATH_SYSTEM . '/core/loader/LShare_Model_Loader.php';
    $this->model = new LShare_Model_Loader();

    // Load View
    require_once PATH_SYSTEM . '/core/loader/LShare_View_Loader.php';
    $this->view = new LShare_View_Loader();
  }
}
