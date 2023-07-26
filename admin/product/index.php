<?php
require "../../global.php";
require "../../dao/product.php";
require "../../dao/category.php";

extract($_REQUEST);

if (exist_param('btn_insert')) {
  // Khi có tham số truyền vào là btn_insert thì sẽ lấy dữ liệu và insert
  $image = save_file("image", "/content/images/product/"); //image là name của input type file
  $imageUrl = 'content/images/product/' . $image;

  // Kiểm tra dữ liệu
  if (strlen($name) == 0 || strlen($price) == 0 || strlen($discount) == 0) {
    $MESSAGE = "Please enter full information!";
  } else {
    try {
      // Thực hiện insert và giải phóng biến
      product_insert($name, $price, $category_id, $imageUrl, $description, $discount);
      unset($name, $price, $category_id, $image, $description, $discount);
      $MESSAGE = "New product added successfully!";
    } catch (\Exception $e) {
      echo $e->getMessage();
      $MESSAGE = "New product added failed!";
    }

  }

  $VIEW_NAME = "product/new.php";

} else if (exist_param('btn_update')) {
  // Khi có tham số truyền vào là btn_update thì sẽ lấy dữ liệu và update

  $imageUrl = $defaultImage;

  // Nếu có chọn ảnh mới thì lấy ảnh mới
  if (!empty($_FILES['image']['name'])) {
    $imageName = save_file("image", "/content/images/product/"); //image là name của input type file
    $imageUrl = 'content/images/product/' . $imageName;
  }

  if (strlen($name) == 0 || strlen($price) == 0 || strlen($discount) == 0) {
    $MESSAGE = "Please enter full information!";
  } else {
    try {
      product_update($name, $price, $category_id, $imageUrl, $description, $discount, $product_id);
      unset($name, $price, $category_id, $image, $description, $discount);
      $MESSAGE = "Product updated successfully!";
    } catch (\Exception $e) {
      echo $e->getMessage();
      $MESSAGE = "Product updated failed!";
    }

  }
  // Hiển thị lại trang list.php
  $items = product_select_all();
  $VIEW_NAME = "product/list.php";

} else if (exist_param('btn_delete')) {
  // Khi có tham số truyền vào là btn_delete thì sẽ lấy dữ liệu và delete
  try {
    product_delete($product_id);
    $items = product_select_all();
    $MESSAGE = "Product removed successfully!";
  } catch (\Exception $e) {
    echo $e->getMessage();
    $MESSAGE = "Product removed failed!";
  }

  // Quay về trang danh sách
  $items = product_select_all();
  $VIEW_NAME = "product/list.php";

} else if (exist_param('btn_edit')) {
  // Khi có tham số truyền vào là btn_edit thì hiển thị trang product edit.php
  try {
    $item = product_select_by_id($product_id);

    extract($item);

  } catch (\Exception $e) {
    echo $e->getMessage();
  }
  $VIEW_NAME = "product/edit.php";

} else if (exist_param("btn_new")) {
  // Nếu có tham số truyền vào là btn_new thì hiển thị trang product new.php
  $VIEW_NAME = "product/new.php";

} else {
  $items = product_select_all();
  $VIEW_NAME = "product/list.php";
}

// Lấy danh sách category
if ($VIEW_NAME == "product/new.php" || $VIEW_NAME == "product/edit.php") {
  $category_select_list = category_select_all();
}


require "../layout.php";