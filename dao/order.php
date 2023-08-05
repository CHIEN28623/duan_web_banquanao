<?php

require_once 'pdo.php';

function order_user($body, $user_id, $product_id)
{
  $sql = "INSERT INTO order(body, user_id, product_id) VALUES(?,?,?)";
  pdo_execute($sql, $body, $user_id, $product_id);
}

function order_insert($body, $user_id, $product_id)
{
  $sql = "INSERT INTO order(body, user_id, product_id) VALUES(?,?,?)";
  pdo_execute($sql, $body, $user_id, $product_id);
}

function order_count($product_id)
{
  $sql = "SELECT count(*) FROM order WHERE product_id=?";
  return pdo_query_value($sql, $product_id);
}


function order_select_all()
{
  $sql = "SELECT * FROM orders";
  return pdo_query($sql);
}

function order_select_by_id($id)
{
  $sql = "SELECT * FROM orders o JOIN users u on o.user_id = u.user_id WHERE order_id=?";
  return pdo_query($sql, $id);
}

function order_exist($id)
{
  $sql = "SELECT count(*) FROM order WHERE order_item_id=?";
  return pdo_query_value($sql, $id) > 0;
}

function order_item_select_by_order($order_id)
{
  $sql = "SELECT * from order_items oi inner join products p on oi.product_id=p.product_id  WHERE order_id=?";
  return pdo_query($sql, $order_id);
}


function order_user_insert($user_id, $tutal_price, $address, $phone_number, $date)
{
  $sql = "INSERT INTO orders(user_id, total_price, address, phone_number, date ) VALUES(?,?,?,?,?)";
  pdo_execute($sql, $user_id, $tutal_price, $address, $phone_number, $date);
}
function insert_order($user_id, $total_price, $address, $phone_number, $fullname, $email)
{
  $sql = "insert into orders(user_id, total_price, address, phone_number, fullname, email, status ) 
        values ($user_id,'$total_price','$address','$phone_number', '$fullname', '$email', 0)";
  $result = pdo_execute_and_return($sql);
  return $result;
}

function order_count_all()
{
  $sql = "SELECT count(*) FROM orders";
  return pdo_query_value($sql);
}

function order_pagination($start, $limit)
{
  $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT $start, $limit";
  return pdo_query($sql);
}

function order_update_status($order_id, $status)
{
  $sql = "UPDATE orders SET status=? WHERE order_id=?";
  pdo_execute($sql, $status, $order_id);
}