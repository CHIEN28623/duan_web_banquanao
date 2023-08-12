<?php

session_start();

extract($_GET);

$cart = $_SESSION['cart'];
$maxQuantity = 10;


if ($action == 'increase') {
  // tìm kiếm trong mảng, trùng size với trùng mã thì tăng số lượng lên 1
  foreach ($cart as $key => $item) {
    if ($item['id'] == $id && $item['size'] == $size) {
      $cart[$key]['quantity']++;
      if ($cart[$key]['quantity'] > $maxQuantity) {
        $cart[$key]['quantity'] = $maxQuantity;
      }
    }
  }
} else if ($action == 'decrease') {
  // tìm kiếm trong mảng, trùng size với trùng mã thì giảm số lượng xuống 1
  foreach ($cart as $key => $item) {
    if ($item['id'] == $id && $item['size'] == $size) {
      $cart[$key]['quantity']--;
      if ($cart[$key]['quantity'] == 0) {
        $cart[$key]['quantity'] = 1;
      }
    }
  }
} else if ($action == 'delete') {
  // tìm kiếm trong mảng, trùng size với trùng mã thì xóa luôn
  foreach ($cart as $key => $item) {
    if ($item['id'] == $id && $item['size'] == $size) {
      unset($cart[$key]);
    }
  }
}

$_SESSION['cart'] = $cart;

$total = 0;
$totalItem = 0;

foreach ($cart as $item) {
  $total += $item['price'] * $item['quantity'];
  $totalItem += $item['quantity'];
}



$quantity;
$totalPriceItem;

// trả về mảng cart item có id và size trùng với id và size truyền vào
foreach ($cart as $key => $item) {
  // echo "item. $key =? $item";
  if ($item['id'] == $id && $item['size'] == $size) {
    $quantity = $item['quantity'];
    $totalPriceItem = $item['price'] * $item['quantity'];
  }
}

$response['total'] = $total;
$response['totalItem'] = $totalItem;
$response['quantity'] = $quantity;
$response['totalPriceItem'] = $totalPriceItem;

echo json_encode($response);

?>