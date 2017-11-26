	
<?php
session_start();

// $_SESSION['permission'] = 10;
// Đường dẫn tới hệ  thống
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/admin');

define('PERMISSION_ADMIN', 99);
define('PERMISSION_CENSOR', 10);
define('PERMISSION_GUEST', 0);

// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');

//mở file LShare_Common.php, file này chứa hàm LShare_Load() chạy hệ thống
include_once PATH_SYSTEM . '/core/LShare_Common.php';

// Chương trình chính
LShare_load();
// debug($_SESSION);
