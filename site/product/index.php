<?php
require_once '../../global.php';

extract($_REQUEST);

if (exist_param("account")) {
  $VIEW_NAME = "account/profile.php";
} else if (exist_param("product-details")) {
  $VIEW_NAME = "product/products.php";
} else {
  require_once '../../dao/product.php';
  require_once '../../dao/category.php';
  $categories = category_select_all();

  if (!isset($category_id)) {
    $category_id = $categories[0]['category_id'];
  }

  $products_per_page = 4;

  $totalPage = ceil(product_count_by_category($category_id) / $products_per_page);
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $start_limit = ($page - 1) * $products_per_page;

  $products = product_pagination_by_category_id($category_id, $start_limit, $products_per_page);



  $VIEW_NAME = "product/all_products.php";

}

require '../layout.php';