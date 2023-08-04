<?php
require_once '../../global.php';
require_once '../../dao/order.php';
extract($_REQUEST);


if (exist_param('delete')) {
  $cart = $_SESSION['cart'];
  $total = 0;
  $totalItem = 0;

  foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
    $totalItem += $item['quantity'];
  }

  insert_sanpham($_SESSION['user_id'], $total, $address, $phone_number);
  $orders = order_select_by_id($_SESSION['user_id']);
  $MESSAGE = "New product added successfully!";
  $VIEW_NAME = "order/list.php";
} else if (exist_param("address")) {
  require_once '../../dao/user.php';
  $VIEW_NAME = "order/address.php";
  $_SESSION['test'] = $_POST['phone_number'];
} else if (exist_param("delete")) {
  echo "delete";
} else {
  require_once '../../dao/order.php';
  $orders = order_select_by_id($_SESSION['user_id']);
  $VIEW_NAME = "order/list.php";
}

require '../layout.php';