<?php
require "../../global.php";
require "../../dao/user.php";
//--------------------------------//


extract($_REQUEST);

if (exist_param("btn_insert")) {

  $imageUrl;

  // Nếu không trống thì lưu file vào thư mục /content/images/user/
  if (!empty($_FILES['file']['image'])) {
    $image = save_file("image", "/content/images/user/");
    $imageUrl = '/content/images/user/' . $image;

  }

  // Nếu trống thì lấy ảnh mặc định
  $imageUrl = strlen($imageUrl) > 0 ? $imageUrl : '/content/images/user/user.png';

  echo $imageUrl;

  if ($password !== $passwordConfirm) {
    $MESSAGE = "Password and confirm password must be the same!";
  } else if (strlen($fullname) == 0 || strlen($email) == 0 || strlen($password) == 0) {
    $MESSAGE = "Please enter full information!";
  } else {
    try {
      admin_insert($fullname, $email, $imageUrl, $password, $is_admin);
      unset($fullname, $email, $imageUrl, $password, $is_admin);
      $MESSAGE = "Insert successfully!";
    } catch (Exception $exc) {
      $MESSAGE = "Insert failed!";
    }
  }



  $VIEW_NAME = "user/new.php";
} else if (exist_param("btn_update")) {

  $imageUrl;

  if (!empty($_FILES['file']['image'])) {
    $image = save_file("image", "/content/images/user/");
    $imageUrl = '/content/images/user/' . $image;
  }

  echo $imageUrl;

  $VIEW_NAME = "user/edit.php";
} else if (exist_param("btn_delete")) {
  try {
    users_delete($user_id);
    $items = users_select_all();
    $MESSAGE = "Removed successfully!";
  } catch (Exception $exc) {
    $MESSAGE = "Removed failed!";
  }
  $VIEW_NAME = "user/list.php";
} else if (exist_param("btn_edit")) {
  $item = users_select_by_id($user_id);
  extract($item);
  $VIEW_NAME = "user/edit.php";
} else if (exist_param("btn_list")) {
  $items = users_select_all();
  $VIEW_NAME = "user/list.php";
} else {
  $VIEW_NAME = "user/new.php";
}

require "../layout.php";