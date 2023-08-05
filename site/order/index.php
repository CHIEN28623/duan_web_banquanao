<?php
require_once '../../global.php';
require_once '../../dao/order.php';
extract($_REQUEST);
$cart = $_SESSION['cart'];


if (exist_param('delete')) {

  $orders = order_select_by_id($_SESSION['user_id']);
  $MESSAGE = "New product added successfully!";
  $VIEW_NAME = "order/list.php";

} else if (exist_param("addressss")) {

  require_once '../../dao/user.php';
  $VIEW_NAME = "order/address.php";
  $_SESSION['test'] = $_POST['phone_number'];

} else if (exist_param("success")) {
  require_once '../../dao/order-item.php';
  // thêm vào bàng order item
  $order_id = insert_order($_SESSION['user_id'], $total, $address, $phone_number, $fullname, $email);

  foreach ($cart as $item) {
    $product_id = $item['id'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $size = $item['size'];
    insert_order_item($order_id, $product_id, $quantity, $price, $size);
  }

  require_once '../email.php';

  $VIEW_NAME = "order/success.php";

} else if (exist_param("information")) {
  $VIEW_NAME = "order/information.php";
} else {

  require_once '../../dao/order.php';
  $orders = order_select_by_id($_SESSION['user_id']);
  $VIEW_NAME = "order/list.php";
}

require '../layout.php';