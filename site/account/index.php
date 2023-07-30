<?php
require "../../global.php";
require "../../dao/category.php";
//--------------------------------//


extract($_REQUEST);

if (exist_param("profile")) {
  $VIEW_NAME = "account/profile.php";
} else if (exist_param("btn_update")) {
  try {
    category_update($category_id, $name);
    $MESSAGE = "Update successful!";
  } catch (Exception $exc) {
    $MESSAGE = "Update failed!";
  }

  $VIEW_NAME = "category/edit.php";
} else if (exist_param("btn_delete")) {
  try {
    category_delete($category_id);
    $items = category_select_all();
    $MESSAGE = "Remove successful!";
  } catch (Exception $exc) {
    $MESSAGE = "Remove failed!";
  }

  $VIEW_NAME = "category/list.php";
} else if (exist_param("btn_edit")) {
  $item = category_select_by_id($category_id);
  extract($item);

  $VIEW_NAME = "category/edit.php";
} else if (exist_param("btn_list")) {
  $items = category_select_all();

  $VIEW_NAME = "category/list.php";
} else {

  $VIEW_NAME = "category/new.php";
}

require "../layout.php";