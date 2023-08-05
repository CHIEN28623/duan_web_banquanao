<?php
require_once 'pdo.php';

function insert_order_item($order_id, $product_id, $quantity, $price, $size)
{
  $sql = "INSERT INTO order_items(order_id, product_id, quantity, price, size) VALUES(?,?,?,?, ?)";
  pdo_execute($sql, $order_id, $product_id, $quantity, $price, $size);
}

?>