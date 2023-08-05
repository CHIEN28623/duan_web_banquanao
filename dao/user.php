<?php

require_once 'pdo.php';

function users_insert($fullname, $email, $password)
{
  $sql = "INSERT INTO users(fullname, email, password, image, is_admin) VALUES(?,?,?, '/content/images/user/user.png', 0)";
  pdo_execute($sql, $fullname, $email, $password);
}

function admin_insert($fullname, $email, $image, $password, $is_admin)
{
  $sql = "INSERT INTO users(fullname, email, image, password, is_admin) VALUES(?,?,?,?,?)";
  pdo_execute($sql, $fullname, $email, $image, $password, $is_admin);
}

function users_update($fullname, $email, $image, $password, $is_admin, $id)
{
  $sql = "UPDATE users SET fullname=?, email=?, image=?, password=?, is_admin=? WHERE user_id=?";
  pdo_execute($sql, $fullname, $email, $image, $password, $is_admin, $id);
}

function users_update_without_image($fullname, $email, $password, $is_admin, $id)
{
  $sql = "UPDATE users SET fullname=?, email=?, password=?, is_admin=? WHERE user_id=?";
  pdo_execute($sql, $fullname, $email, $password, $is_admin, $id);
}

function customers_update($fullname, $password, $image, $id)
{
  $sql = "UPDATE users SET fullname=?, password=?, image=? WHERE user_id=?";
  pdo_execute($sql, $fullname, $password, $image, $id);
}

function users_delete($id)
{
  $sql = "DELETE FROM users WHERE user_id=?";
  if (is_array($id)) {
    foreach ($id as $i) {
      pdo_execute($sql, $i);
    }
  } else {
    pdo_execute($sql, $id);
  }
}

function users_select_all()
{
  $sql = "SELECT * FROM users";
  return pdo_query($sql);
}

function users_select_by_id($id)
{
  $sql = "SELECT * FROM users WHERE user_id=?";
  return pdo_query_one($sql, $id);
}
function users_select_id($id)
{
  $sql = "SELECT * FROM users WHERE user_id=?";
  return pdo_query($sql, $id);
}
function users_select_by_email($email)
{
  $sql = "SELECT * FROM users WHERE email=?";
  return pdo_query_one($sql, $email);
}

function users_exist($email)
{
  $sql = "SELECT count(*) FROM users WHERE email=?";
  return pdo_query_value($sql, $email) > 0;
}

function users_count()
{
  $sql = "SELECT count(*) FROM users";
  return pdo_query_value($sql);
}

function users_select_by_role($role)
{
  $sql = "SELECT * FROM users WHERE is_admin=?";
  return pdo_query($sql, $role);
}


function users_change_password($id, $password)
{
  $sql = "UPDATE users SET password=? WHERE user_id=?";
  pdo_execute($sql, $password, $id);
}

function users_pagination($start_limit, $end_limit)
{
  $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT $start_limit, $end_limit";
  return pdo_query($sql);
}