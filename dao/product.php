<?php

require_once "pdo.php";

function product_insert($name, $price, $category_id, $image, $description, $discount, $size_S, $size_M, $size_L)
{
  $sql = "insert into products(name, price, category_id, image, description, discount, size_S, size_M, size_L) values(?,?,?,?,?,?, ?, ?, ?)";
  pdo_execute($sql, $name, $price, $category_id, $image, $description, $discount, $size_S, $size_M, $size_L);

}

function product_delete($id)
{
  $sql = "delete from products where product_id=?";
  if (is_array($id)) {
    foreach ($id as $i) {
      pdo_execute($sql, $i);
    }
  } else {
    pdo_execute($sql, $id);
  }
}

function product_update($name, $price, $category_id, $image, $description, $discount, $product_id, $size_S, $size_M, $size_L)
{
  $sql = "update products set name=?, price=?, category_id=?, image=?, description=?, discount=?, size_S=?, size_M=?, size_L= ? where product_id=?";
  pdo_execute($sql, $name, $price, $category_id, $image, $description, $discount, $size_S, $size_M, $size_L, $product_id);
}

function product_select_all()
{
  $sql = "select * from products";
  return pdo_query($sql);
}

function product_pagination($start_limit, $end_limit)
{
  $sql = "select * from products where category_id != 1 order by product_id desc limit $start_limit, $end_limit";
  return pdo_query($sql);
}

function product_pagination_by_price_desc($start_limit, $end_limit)
{
  $sql = "select * from products order by price desc limit $start_limit, $end_limit";
  return pdo_query($sql);
}

function product_pagination_by_price_asc($start_limit, $end_limit)
{
  $sql = "select * from products order by price asc limit $start_limit, $end_limit";
  return pdo_query($sql);
}

function product_pagination_by_category_id($category_id, $start_limit, $end_limit)
{
  $sql = "select * from products where category_id = ? order by created_at desc limit $start_limit, $end_limit";
  return pdo_query($sql, $category_id);
}

function product_pagination_by_category_price_desc($category_id, $start_limit, $end_limit)
{
  $sql = "select * from products where category_id = ? order by price desc limit $start_limit, $end_limit";
  return pdo_query($sql, $category_id);
}

function product_pagination_by_category_price_asc($category_id, $start_limit, $end_limit)
{
  $sql = "select * from products where category_id = ? order by price asc limit $start_limit, $end_limit";
  return pdo_query($sql, $category_id);
}

function product_select_by_id($id)
{
  $sql = "select * from products where product_id=?";
  return pdo_query_one($sql, $id);
}


function product_increase_view($id)
{
  $sql = "update products set view = view + 1 where product_id=?";
  pdo_execute($sql, $id);
}


function product_isSpecial()
{
  $sql = "select * from products where  = 1";
  return pdo_query($sql);
}

function product_select_by_category($id)
{
  $sql = "select * from products where category_id = ?";
  return pdo_query($sql, $id);
}

function product_select_by_category_except_product_id($category_id, $id)
{
  $sql = "select * from products where category_id = ? and product_id != ?";
  return pdo_query($sql, $category_id, $id);
}

function product_select_by_keyword($keyword)
{
  $sql = "select * from products where name like ?";
  return pdo_query($sql, '%' . $keyword . '%');
}


// Lấy ra các lượt xem các sản phẩm được tạo ra trong mỗi tháng
function product_count_views_each_month()
{
  $sql = "SELECT MONTH(created_at) as month, SUM(view) as views FROM products GROUP BY MONTH(created_at)";
  return pdo_query($sql);
}

function product_count()
{
  $sql = "SELECT count(*) FROM products where category_id != 1";
  return pdo_query_value($sql);
}

function product_count_by_category($id)
{
  $sql = "SELECT count(*) FROM products WHERE category_id = ?";
  return pdo_query_value($sql, $id);
}

function product_count_by_category_name($name)
{
  $sql = "SELECT count(*) FROM products WHERE category_id = (SELECT category_id FROM categories WHERE name = ?)";
  return pdo_query_value($sql, $name);
}

function product_count_by_keyword($keyword)
{
  $sql = "SELECT count(*) FROM products WHERE name like ?";
  return pdo_query_value($sql, '%' . $keyword . '%');
}

function product_count_by_price($price)
{
  $sql = "SELECT count(*) FROM products WHERE price <= ?";
  return pdo_query_value($sql, $price);
}

function product_count_by_discount($discount)
{
  $sql = "SELECT count(*) FROM products WHERE discount >= ?";
  return pdo_query_value($sql, $discount);
}

function product_update_size_quantity($product_id, $size, $size_quantity)
{
  $sql = "update products set $size = ? where product_id = ?";
  pdo_execute($sql, $size_quantity, $product_id);
}