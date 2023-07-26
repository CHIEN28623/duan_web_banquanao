<?php
require "../../global.php";
require "../../dao/user.php";
//--------------------------------//


extract($_REQUEST);

if (exist_param("btn_insert")) {

  $imageUrl;

  if (!empty($_FILES['file']['image'])) {
    $image = save_file("image", "/content/images/user/");
    $imageUrl = '/content/images/user/' . $image;

  }

  $imageUrl = strlen($imageUrl) > 0 ? $imageUrl : '/content/images/user/user.png';

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

  if ($password !== $passwordConfirm) {
    $MESSAGE = "Password and confirm password must be the same!";
  } else if (strlen($fullname) == 0 || strlen($email) == 0 || strlen($password) == 0) {
    $MESSAGE = "Please enter full information!";
  } else {
    try {
      if (empty($imageUrl)) {
        users_update_without_image($fullname, $email, $isActive, $password, $is_admin, $user_id);
      } else {
        users_update($fullname, $email, $isActive, $imageUrl, $password, $is_admin, $user_id);
      }

      $MESSAGE = "Update successfully!";
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $MESSAGE = "Update failed!";
    }
  }
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