<?php
require_once '../../global.php';
extract($_REQUEST);

if (exist_param("account")) {
  $VIEW_NAME = "account/profile.php";
} else if (exist_param("product-details")) {
  $VIEW_NAME = "product/index.php";
} else if (exist_param("cart")) {
  $VIEW_NAME = "cart/index.php";
} else if (exist_param("search")) {
  require_once '../../dao/product.php';
  $searchedItems = product_select_by_keyword($_GET['search']);

  $VIEW_NAME = "homepage/search.php";
} else if (exist_param("address")) {
  require_once '../../dao/user.php';
  $users = users_select_id($_SESSION['user_id']);
  $VIEW_NAME = "order/address.php";
  $_SESSION['test'] = $_POST['phone_number'];
} else if (exist_param('thanhtoan')) {

  require_once '../../dao/order.php';

  $cart = $_SESSION['cart'];
  $total = 0;
  $totalItem = 0;
  $date = 1;
  $address = 'hải phòng';
  $phone_number = $_SESSION['test'];
  foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
    $totalItem += $item['quantity'];
  }
  echo $phone_number;
  insert_sanpham($_SESSION['user_id'], $total, $address, $phone_number);
  echo "qử";
  $orders = order_select_by_id($_SESSION['user_id']);
  echo "test";
  //  var_dump($_SESSION['user_id']);  
  //  unset($_SESSION['user_id'], $total, $address, $phone_number,$date);
  $MESSAGE = "New product added successfully!";
  $VIEW_NAME = "order/list.php";
} else {
  require_once '../../dao/order.php';
  $orders = order_select_by_id($_SESSION['user_id']);
  $VIEW_NAME = "order/list.php";
}

require '../layout.php';