<?php

require_once 'pdo.php';

function comments_insert($body, $user_id, $product_id)
{
  $sql = "INSERT INTO comments(body, user_id, product_id) VALUES(?,?,?)";
  pdo_execute($sql, $body, $user_id, $product_id);
}

function comments_update($body, $user_id, $product_id, $id)
{
  $sql = "UPDATE comments SET body=?, user_id=?, product_id=? WHERE comment_id=?";
  pdo_execute($sql, $body, $user_id, $product_id, $id);
}

function comments_count($product_id)
{
  $sql = "SELECT count(*) FROM comments WHERE product_id=?";
  return pdo_query_value($sql, $product_id);
}

function comments_delete($id)
{
  $sql = "DELETE FROM comments WHERE comment_id=?";
  if (is_array($id)) {
    foreach ($id as $i) {
      pdo_execute($sql, $i);
    }
  } else {
    pdo_execute($sql, $id);
  }
}

function comments_select_all()
{
  $sql = "SELECT * FROM comments";
  return pdo_query($sql);
}

function comments_select_by_id($id)
{
  $sql = "SELECT * FROM comments WHERE comment_id=?";
  return pdo_query_one($sql, $id);
}

function comments_exist($id)
{
  $sql = "SELECT count(*) FROM comments WHERE comment_id=?";
  return pdo_query_value($sql, $id) > 0;
}

function comments_select_by_product($product_id)
{
  $sql = "SELECT * FROM comments WHERE product_id=?";
  return pdo_query($sql, $product_id);
}

function comments_count_all()
{
  $sql = "SELECT count(*) FROM comments";
  return pdo_query_value($sql);
}

function comments_pagination($start_limit, $end_limit)
{
  $sql = "SELECT * FROM comments LIMIT $start_limit, $end_limit";
  return pdo_query($sql);
}

function comments_pagination_by_product($product_id, $start_limit, $end_limit)
{
  $sql = "SELECT * FROM comments join users on comments.user_id = users.user_id WHERE product_id=?  LIMIT $start_limit, $end_limit ";
  return pdo_query($sql, $product_id);

}