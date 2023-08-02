<?php

require_once 'pdo.php';

function statistic_product()
{
  $sql = "select c.category_id, c.name,"
    . "count(*) as quantity "
    . "min(p.price) as minPrice, "
    . "max(p.price) as maxPrice,"
    . "avg(p.price) as avgPrice "
    . "from products p join categories c on p.category_id=c.category_id "
    . "group by c.category_id, c.name";

  return pdo_query($sql);
}

function statistic_comment()
{
  $sql = "select p.name, p.product_id,
    count(*) as quantity, 
    min(cm.created_at) as firstDate, 
    max(cm.created_at) as lastDate
    from comments cm join products p on cm.product_id=p.product_id 
     group by p.name, p.product_id
     having quantity > 0";

  return pdo_query($sql);
}
function statistic_order()  
{
  $sql = " SELECT * from orders o  inner join users u on o.user_id = u.user_id 
  ";
  return pdo_query($sql);
}
function statistic_order_items(){
  $sql = " SELECT * from order_items oi inner join products p on oi.product_id=p.product_id ";
  return pdo_query($sql);
}

// inner join products p on p.product_id = oi.product_id inner join users u on o.user_id = u.user_id 