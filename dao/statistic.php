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