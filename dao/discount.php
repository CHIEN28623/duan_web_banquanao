<?php

require_once 'pdo.php';

function discount_insert($name, $percent, $user_id)
{
  $sql = "insert into sale_codes(content, percent, user_id) values(?,?,?)";
  pdo_execute($sql, $name, $percent, $user_id);
}


function discount_delete($id)
{
  $sql = "delete from sale_codes where sale_code_id=?";
  if (is_array($id)) {
    foreach ($id as $i) {
      pdo_execute($sql, $i);
    }
  } else {
    pdo_execute($sql, $id);
  }
}

function discount_select_by_content($content)
{
  $sql = "select * from sale_codes where content=?";
  return pdo_query_one($sql, $content);
}

function discount_select_all()
{
  $sql = "select * from sale_codes s join users u on s.user_id = u.user_id";
  return pdo_query($sql);
}

function discount_select_by_id($id)
{
  $sql = "select * from sale_codes where sale_code_id=?";
  return pdo_query_one($sql, $id);
}