<?php
require "../../global.php";
require "../../dao/order.php";
require "../../dao/statistic.php";


extract($_REQUEST);
if (exist_param("order_id")) {
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
    $items = statistic_order();
  } catch (Exception $exc) {
    echo $exc->getMessage();
  }
  $VIEW_NAME = "order/list.php";
}

require "../layout.php";

?>