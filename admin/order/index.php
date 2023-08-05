<?php
include "../../global.php";
include "../../dao/order.php";
include "../../dao/product.php";
include "../../dao/statistic.php";

$filter = null;
$category_id = null;


extract($_REQUEST);
if (exist_param("update_status")) {
  echo $order_id, intval($status);


} else if (exist_param("btn_edit")) {
  $item = order_select_by_id($order_id);
  $item = $item[0];
  $VIEW_NAME = "order/edit.php";
} else if (exist_param("btn_update")) {
  order_update_status($order_id, intval($status));

  // Nếu status = 2 thì cập nhật lại số lượng size 
  if (intval($status) == 2 || intval($status) == 1) {
    $items = order_item_select_by_order($order_id);

    foreach ($items as $item) {
      $size = $item['size'];

      $quantity = $item['quantity'];
      $product_id = $item['product_id'];
      $product = product_select_by_id($product_id);

      $size_quantity = intval($product[$size]);
      $size_quantity = $size_quantity - $quantity;
      product_update_size_quantity($product_id, $size, $size_quantity);
    }
  }

  header("location: index.php");
} else if (exist_param("order_id")) {
  if (exist_param("btn_delete")) {
    // order_delete($comment_id);
    $MESSAGE = "Delete successfully!";
  }
  $items = order_item_select_by_order($order_id);

  if (count($items) == 0) {
    $items = statistic_order_items();
    $VIEW_NAME = "order/list.php";
  } else {
    $VIEW_NAME = "order/details.php";
  }
} else {
  try {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $orders_per_page = 6;
    $totalPage = ceil(order_count_all() / $orders_per_page);
    $start_limit = ($page - 1) * $orders_per_page;
    $end_limit = $orders_per_page;


    $items = order_pagination($start_limit, $end_limit);
  } catch (Exception $exc) {
    echo $exc->getMessage();
  }

  $VIEW_NAME = "order/list.php";
}

require "../layout.php";

?>