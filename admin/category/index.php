<?php
require "../../global.php";
require "../../dao/category.php";
//--------------------------------//


extract($_REQUEST);

if (exist_param("btn_insert")) {
  if (strlen($name) == 0) {
    $MESSAGE = "Please enter category name!";
  } else if (strlen($name) < 2) {
    $MESSAGE = "Category name must be at least 2 characters!";
  } else if (strlen($name) > 50) {
    $MESSAGE = "Category name must be less than 50 characters!";
  } else if (category_exist($name)) {
    $MESSAGE = "Category name already exists!";
  } else {
    category_insert($name);
    $MESSAGE = "Create successful!";
  }

  unset($name, $category_id);
  $VIEW_NAME = "category/new.php";
} else if (exist_param("btn_update")) {
  try {
    category_update($category_id, $name);
    $MESSAGE = "Cập nhật thành công!";
  } catch (Exception $exc) {
    $MESSAGE = "Cập nhật thất bại";
  }

  $VIEW_NAME = "category/edit.php";
} else if (exist_param("btn_delete")) {
  try {
    category_delete($category_id);
    $items = category_select_all();
    $MESSAGE = "Xoá thành công!";
  } catch (Exception $exc) {
    $MESSAGE = "Không được phép xoá, vì có sản phẩm thuộc danh mục này!";
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