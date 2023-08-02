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

  $defaultImage = '/content/images/user/user.png';
  $imageUrl = $defaultImage;
  $image = $_FILES['image']['name'];
  $target_dir = "../../content/images/user/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;

  // check đuôi file
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if ($_FILES["image"]["size"] > 100000) {
    $MESSAGE = "Image size too large!";
    $uploadOk = 0;
  }


  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $MESSAGE = "Only JPG, JPEG, PNG & GIF files are allowed!";
    echo $imageFileType;
    $uploadOk = 0;
  }

  // upload file
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $imageUrl = '/content/images/user/' . $image;
    } else {
      $MESSAGE = "Sorry, there was an error uploading your file.";
    }
  }

  if ($password !== $passwordConfirm) {
    $MESSAGE = "Password and confirm password must be the same!";
  } else if (strlen($fullname) == 0 || strlen($email) == 0 || strlen($password) == 0) {
    $MESSAGE = "Please enter full information!";
  } else if ($uploadOk == 1) {
    try {
      users_update($fullname, $email, $imageUrl, $password, $is_admin, $user_id);
      unset($fullname, $email, $imageUrl, $password, $is_admin);
      $MESSAGE = "Update successfully!";
    } catch (Exception $exc) {
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

} else if (exist_param("btn_new")) {
  $VIEW_NAME = "user/new.php";
} else {

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $users_per_page = 4;
  $totalPage = ceil((users_count()) / $users_per_page);
  $start_limit = ($page - 1) * $users_per_page;
  $end_limit = $users_per_page;


  $items = users_pagination($start_limit, $end_limit);
  $VIEW_NAME = "user/list.php";
}

require "../layout.php";