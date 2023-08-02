<?php
require "../../global.php";
require "../../dao/product.php";
require "../../dao/category.php";

extract($_REQUEST);

if (exist_param('btn_insert')) {
  // Khi có tham số truyền vào là btn_insert thì sẽ lấy dữ liệu và insert

  //validate image file
  $defaultImage = 'content/images/product/default-image.jpeg';
  $imageUrl = $defaultImage;
  $image = $_FILES['image']['name'];
  $target_dir = "../../content/images/product/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;

  // Check đuôi mở rộng của tệp
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check file size

  if ($_FILES["image"]["size"] > 100000) {
    $MESSAGE = "Image size too large!";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && isset($_FILES["image"]["name"])
  ) {
    $MESSAGE = "Only JPG, JPEG, PNG & GIF files are allowed!";
    $uploadOk = 0;
  }
  // UPload file 
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $imageUrl = 'content/images/product/' . $image;
    } else {
      $MESSAGE = "Sorry, there was an error uploading your file.";
    }
  }

  // Nếu không upload ảnh thì lấy ảnh mặc định
  if (strlen($image) == 0) {
    $imageUrl = $defaultImage;
    $uploadOk = 1;
    $MESSAGE = "";
  }

  // Kiểm tra dữ liệu
  if (strlen($name) == 0 || strlen($price) == 0 || strlen($discount) == 0) {
    $MESSAGE = "Please enter full information!";
  } else if ($uploadOk == 1) {
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
  //validate image file
  $defaultImage = 'content/images/product/default-image.jpeg';
  $imageUrl = $defaultImage;
  $image = $_FILES['image']['name'];
  $target_dir = "../../content/images/product/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;

  // Check đuôi mở rộng của tệp
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check file size

  if ($_FILES["image"]["size"] > 100000) {
    $MESSAGE = "Image size too large!";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && isset($_FILES["image"]["name"])
  ) {
    $MESSAGE = "Only JPG, JPEG, PNG & GIF files are allowed!";
    $uploadOk = 0;
  }
  // UPload file 
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $imageUrl = 'content/images/product/' . $image;
    } else {
      $MESSAGE = "Sorry, there was an error uploading your file.";
    }
  }

  // Nếu không upload ảnh thì lấy ảnh mặc định
  if (strlen($image) == 0) {
    $imageUrl = $defaultImage;
    $uploadOk = 1;
    $MESSAGE = "";
  }


  if (strlen($name) == 0 || strlen($price) == 0 || strlen($discount) == 0) {
    $MESSAGE = "Please enter full information!";
  } else if ($uploadOk == 1) {
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
  // Khởi tạo tham số cho thứ tự trang
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $products_per_page = 4;
  $totalPage = ceil((product_count()) / $products_per_page);
  $start_limit = ($page - 1) * $products_per_page;
  $end_limit = $products_per_page;


  $items = product_pagination($start_limit, $end_limit);
  $VIEW_NAME = "product/list.php";
}

// Lấy danh sách category
if ($VIEW_NAME == "product/new.php" || $VIEW_NAME == "product/edit.php") {
  $category_select_list = category_select_all();
}


require "../layout.php";