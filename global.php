<?php
session_start();
$ROOT_URL = "";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";

/*
 * 2 biến toàn cục cần thiết để chia sẻ giữa controller và view
 */
$VIEW_NAME = "index.php";
$MESSAGE = "";

/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */

function exist_param($param_name)
{
  return isset($_GET[$param_name]) || isset($_POST[$param_name]);
}

function save_file($fieldname, $target_dir)
{
  $file_uploaded = $_FILES[$fieldname];
  $file_name = basename($file_uploaded["name"]);
  $target_path = $_SERVER["DOCUMENT_ROOT"] . $target_dir . $file_name;

  if (move_uploaded_file($file_uploaded["tmp_name"], $target_path)) {
    return $file_name;
  }

  return false;

}
/**
 * Tạo cookie
 * @param string $name là tên cookie
 * @param string $value là giá trị cookie
 * @param int $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day)
{
  setcookie($name, $value, time() + (86400 * $day), "/");
}

function delete_cookie($name)
{
  add_cookie($name, "", -1);
}


/**
 * Kiểm tra đăng nhập và vai trò sử dụng.
 * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
 * phép sử dụng thì cần thiết phải gọi hàm này trước
 **/
function is_admin()
{
  if ($_SESSION['is_admin'] == 1) {
    return true;
  }
  return false;

}

function is_logged_in()
{
  if (isset($_SESSION['email'])) {
    return true;
  }
  return false;
}