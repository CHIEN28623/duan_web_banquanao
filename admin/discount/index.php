<?php
require "../../global.php";
require "../../dao/discount.php";
//--------------------------------//


extract($_REQUEST);

if (exist_param("btn_insert")) {
  try {
    // validate name phải viết liền và nhỏ hơn 20 kí tự
    $pattern = '/^[a-zA-Z0-9]{1,20}$/';
    if (!preg_match($pattern, $name)) {
      $MESSAGE = "Mã giảm giá phải viết liền không dấu và nhỏ hơn 20 ký tự!";
      throw new Exception();
    }
    discount_insert($name, $percent, $_SESSION["user_id"]);
    unset($name);
    $MESSAGE = "Thêm mới thành công!";
  } catch (Exception $exc) {

  }
  $VIEW_NAME = "new.php";
} else if (exist_param("btn_delete")) {
  try {
    discount_delete($sale_code_id);
    $items = discount_select_all();
    $MESSAGE = "Xóa thành công!";
  } catch (Exception $exc) {
    $MESSAGE = $exc->getMessage();
  }
  $VIEW_NAME = "discount/list.php";
} else if (exist_param("btn_list")) {
  $items = discount_select_all();
  $VIEW_NAME = "list.php";
} else {
  $VIEW_NAME = "new.php";
}



require "../layout.php";